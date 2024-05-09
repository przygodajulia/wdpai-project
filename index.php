<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('my_account', 'UserController');
Routing::get('sign_up', 'RacesController');
Routing::get('races', 'RacesController');
Routing::get('my_races', 'RacesController');
Routing::get('race_details', 'RacesController');
Routing::get('register_mobile_1', 'SecurityController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('register_mobile_2', 'SecurityController');



Routing::run($path);