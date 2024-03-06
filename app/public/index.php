<?php

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$autoloadController = function (string $className) {
    $path = "./../Controller/$className.php";
    if (file_exists($path)) {
        require_once $path;

        return true;
    }

    return false;
};

$autoloadModel = function (string $className) {
    $path = "./../Model/$className.php";
    if (file_exists($path)) {
        require_once $path;

        return true;
    }

    return false;
};

spl_autoload_register($autoloadController);
spl_autoload_register($autoloadModel);



if ($uri === '/registrate') {
    $obj = new UserController();
    if ($method === 'GET') {
        $obj->getRegistrate();
    } elseif ($method === 'POST') {
        $obj->postRegistrate();
    } else {
        echo "$method не поддерживается для адреса $uri!";
    }
} elseif ($uri === '/login') {
    $obj = new UserController();
    if ($method === 'GET') {
        $obj->getLogin();
    } elseif ($method === 'POST') {
        $obj->postLogin();
    } else {
        echo "$method не поддерживается для адреса $uri!";
    }
} elseif ($uri === '/main') {
    $obj = new MainController();
    if ($method === 'GET') {
        $obj->getMain();
    } elseif ($method === 'POST') {
        $obj = new ProductController();
        $obj->postAddProduct();
    } else {
        echo "$method не поддерживается для адреса $uri!";
    }
} elseif
($uri === '/cart') {
    $obj = new CartController();
    if ($method === 'GET') {
        $obj->getCart();
    } elseif ($method === 'POST') {
        $obj->postCart();
    } else {
        echo "$method не поддерживается для адреса $uri!";
    }
} else {
    require_once './../View/404.html';
}