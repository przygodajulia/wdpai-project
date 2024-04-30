<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function races_calendar()
    {
        $this->render('races_calendar');
    }

    public function race_details()
    {
        $this->render('race_details');
    }
}