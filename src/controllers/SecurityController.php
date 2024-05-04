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

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['loginMessages' => ['Wrong password!']]);
        }

        // TODO -> is this the correct place to start session
        session_start();
        $_SESSION['userid'] = $user->getUserId();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/races");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $nameParts = explode(" ", $_POST['fullName']);
        $name = $nameParts[0];
        $surname = $nameParts[count($nameParts) - 1];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $location = $_POST['location'];

        // TODO -> remove user ID from PHP class?
        $user = new User(0, $email, $password, $name, $surname, $location);

        $this->userRepository->addUser($user);

        return $this->render('login', ['registerMessages' => ['You\'ve been succesfully registrated!']]);



    }

}