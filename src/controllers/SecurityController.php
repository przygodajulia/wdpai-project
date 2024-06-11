<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../models/Race.php';
require_once __DIR__ . '/../models/RaceResult.php';
require_once __DIR__ . '/../repository/RacesRepository.php';

class SecurityController extends AppController
{

    const SUPPORTED_TYPES = ['text/csv'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $userRepository;
    private $racesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->racesRepository = new RacesRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['loginMessages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['loginMessages' => ['User with this email not exist!']]);
        }

        if (!$user || !password_verify($password, $user->getPassword())) {
            return $this->render('login', ['loginMessages' => ['Invalid email or password.']]);
        }


        session_start();
        $_SESSION['userid'] = $user->getUserId();
        $_SESSION['isAdmin'] = $this->userRepository->isAdmin($_SESSION['userid']);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/races");
    }

    public function register($view = 'login')
    {
        if (!$this->isPost()) {
            return $this->render($view);
        }

        $nameParts = explode(" ", $_POST['fullName']);
        $name = $nameParts[0];
        $surname = $nameParts[count($nameParts) - 1];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $location = $_POST['location'];
        $emailExists = $this->userRepository->checkEmailExists($email);

        // Validate data before adding user
        if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($location)) {
            return $this->render($view, ['registerMessages' => ['Please fill in all fields.']]);
        }

        if (count($nameParts) < 2) {
            return $this->render($view, ['registerMessages' => ['Please provide both name and surname.']]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->render($view, ['registerMessages' => ['Invalid email format.']]);
        }

        if (strlen($password) < 5) {
            return $this->render($view, ['registerMessages' => ['Password must be at least 5 characters long.']]);
        }
        if ($emailExists) {
            return $this->render($view, ['registerMessages' => ['User with this email already exists.']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $user = new User(0, $email, $hashedPassword, $name, $surname, $location);
        $this->userRepository->addUser($user);

        return $this->render('login', ['registerMessages' => ['You\'ve been successfully registered!']]);
    }

    public function register_mobile_1() {
        return $this->render('register_mobile');
    }

    public function register_mobile_2()
    {
        return $this->register('register_mobile');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        return $this->render('login');
    }

    public function admin_view()
    {
        session_start();
        $userId = $_SESSION['userid'];

        if ($userId == null) {
            return $this->render('info_message', ['message' => 'Not authorized to access this page.']);
        }

        $isAdmin = $this->userRepository->isAdmin($userId);

        if (!$isAdmin) {
            return $this->render('info_message', ['message' => 'Not authorized to access this page.']);
        }

        $finishedRaces = $this->racesRepository->getFinishedRaces();
        return $this->render('admin_view', ['finishedRaces' => $finishedRaces]);

    }

    public function validateType(array $file): bool
    {

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            return false;
        }
        return true;

    }


    public function upload()
    {
        $finishedRaces = $this->racesRepository->getFinishedRaces();

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validateType($_FILES['file']))
        {

            move_uploaded_file( $_FILES['file']['tmp_name'], dirname(__DIR__) .self::UPLOAD_DIRECTORY . $_FILES['file']['name']);

            $csvFile = fopen(dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name'], 'r');
            while (($data = fgetcsv($csvFile, 0, ';')) !== false) {

                $raceResult = new RaceResult($data[0], $data[1], $data[2], $data[3]);
                $this->racesRepository->addRaceResult($raceResult);

            }
            fclose($csvFile);

            return $this->render('admin_view', ['finishedRaces' => $finishedRaces, 'messages' => ['File successfully uploaded!']]);

        }
        return $this->render('admin_view', ['finishedRaces' => $finishedRaces, 'messages' => ['Error while handling the file!']]);

    }


}