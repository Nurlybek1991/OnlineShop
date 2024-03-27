<?php

use Controller\CartController;
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Controller\UserController;
use Core\App;
use Core\Autoloader;
use Request\AddProductRequest;
use Request\LoginRequest;
use Request\OrderRequest;
use Request\RegistrateRequest;

require_once './../Core/Autoloader.php';

Autoloader::registrate(dirname(__DIR__));

$app = new App();

$app->get('/registrate',UserController::class, 'getRegistrate');
$app->post('/registrate',UserController::class, 'postRegistrate',RegistrateRequest::class);

$app->get('/login', UserController::class, 'getLogin');
$app->post('/login', UserController::class, 'postLogin',LoginRequest::class);

$app->get('/main',MainController::class,'getMain');
$app->post('/main',ProductController::class, 'postAddProduct',AddProductRequest::class);

$app->post('/removeProduct',ProductController::class, 'postRemoveProduct',AddProductRequest::class);

$app->get('/cart',CartController::class,'getCart');

$app->get('/order',OrderController::class,'getOrder');
$app->post('/order',OrderController::class, 'postOrder',OrderRequest::class);

$app->get('/orderProduct',OrderController::class,'getOrderProduct');


$app->run();





