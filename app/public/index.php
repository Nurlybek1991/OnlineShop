<?php


use Core\App;
use Core\Autoloader;

require_once './../Core/Autoloader.php';


//Autoloader::registrate(dirname(__DIR__));
$autoloader = new Autoloader();
$autoloader->registrate(dirname(__DIR__));

$app = new App();
$app->run();




//require_once './../Core/Autoloader.php';
//
//$autoloader = new Autoloader();
//$autoloader->registrate();
//
//$app = new App();
//$app->run();


