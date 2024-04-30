<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('races_calendar', 'DefaultController');
Routing::get('race_details', 'RaceCalendarController');

Routing::post('login', 'SecurityController');

var_dump($path);
var_dump(Routing::$routes);

Routing::run($path);