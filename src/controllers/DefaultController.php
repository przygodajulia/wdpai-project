<?php

require_once 'AppController.php';

class DefaultController extends AppController {


    // TODO -> validate which ones can be defined here
    public function index()
    {
        $this->render('login');
    }

//    public function my_races()
//    {
//        $this->render('my_races');
//    }
//
//    public function race_details()
//    {
//        $this->render('race_details');
//    }
//
//    public function info_message()
//    {
//        $this->render('info_message');
//    }


}