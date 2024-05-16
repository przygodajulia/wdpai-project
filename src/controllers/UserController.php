<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class UserController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function my_account()
    {

        session_start();
        $userId = $_SESSION['userid'];

        if ($userId == null)
        {
            return $this->render('info_message', ['message' => 'Please log in first!']);
        }

        $currentUser = $this->userRepository->getUserById($userId);

        return $this->render('my_account', ["currentUser" => $currentUser]);

    }


}