<?php
use Controller\CartController;
use Controller\CommentController;
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Controller\SelectedController;
use Controller\UserController;

use Core\App;
use Core\Autoloader;
use Core\Container;

use Request\AddProductRequest;
use Request\CommentRequest;
use Request\LoginRequest;
use Request\OrderRequest;
use Request\RegistrateRequest;
use Request\SelectedRequest;

require_once './../Core/Autoloader.php';

Autoloader::registrate(dirname(__DIR__));

$services = include './../Config/services.php';

$container = new Container($services);

$app = new App($container);

$app->get('/registrate', UserController::class, 'getRegistrate');
$app->post('/registrate', UserController::class, 'postRegistrate', RegistrateRequest::class);

$app->get('/login', UserController::class, 'getLogin');
$app->post('/login', UserController::class, 'postLogin', LoginRequest::class);

$app->get('/main', MainController::class, 'getMain');
$app->post('/main', ProductController::class, 'postAddProduct', AddProductRequest::class);

$app->post('/removeProduct', ProductController::class, 'postRemoveProduct',AddProductRequest::class);

$app->get('/cart', CartController::class, 'getCart');
$app->post('/remove', CartController::class, 'removeProduct',AddProductRequest::class);


$app->get('/order', OrderController::class, 'getOrder');
$app->post('/order', OrderController::class, 'postOrder', OrderRequest::class);

$app->get('/orderProduct', OrderController::class, 'getOrderProduct');

$app->get('/selected', SelectedController::class, 'getSelected');
$app->post('/selected', SelectedController::class, 'addSelected', SelectedRequest::class);
$app->post('/removeSelected', SelectedController::class, 'deleteSelected', SelectedRequest::class);



$app->post('/openProduct', ProductController::class, 'getProduct', AddProductRequest::class);

$app->post('/addComment', CommentController::class, 'postComment', CommentRequest::class);

$app->run();





