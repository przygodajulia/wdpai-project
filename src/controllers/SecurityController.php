<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password']; // TODO - Add hashing

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


        // TODO -> is this the correct place to start session
        session_start();
        $_SESSION['userid'] = $user->getUserId();

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

        // Password hashing
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


}