<?php

namespace Core;

use Controller\CartController;
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Controller\UserController;
use Request\AddProductRequest;
use Request\LoginRequest;
use Request\OrderRequest;
use Request\RegistrateRequest;
use Request\Request;


class App
{
    private array $routes = [
        '/registrate' => [
            'GET' => [
                'class' => UserController::class,
                'method' => 'getRegistrate',
            ],
            'POST' => [
                'class' => UserController::class,
                'method' => 'postRegistrate',
                'request' => RegistrateRequest::class
             ]
        ],
        '/login' => [
            'GET' => [
                'class' => UserController::class,
                'method' => 'getLogin',
            ],
            'POST' => [
                'class' => UserController::class,
                'method' => 'postLogin',
                'request' => LoginRequest::class
            ]
        ],
        '/main' => [
            'GET' => [
                'class' => MainController::class,
                'method' => 'getMain',
            ],
            'POST' => [
                'class' => ProductController::class,
                'method' => 'postAddProduct',
                'request' => AddProductRequest::class
            ]
        ],
        '/removeProduct' => [
            'POST' => [
                'class' => ProductController::class,
                'method' => 'postRemoveProduct',
                'request' => AddProductRequest::class
            ]
        ],
        '/cart' => [
            'GET' => [
                'class' => CartController::class,
                'method' => 'getCart'
            ]
        ],
        '/order' => [
            'GET' => [
                'class' => OrderController::class,
                'method' => 'getOrder'
            ],
            'POST' => [
                'class' => OrderController::class,
                'method' => 'postOrder',
                'request' => OrderRequest::class
            ]
        ],
        '/orderProduct' => [
            'GET' => [
                'class' => OrderController::class,
                'method' => 'getOrderProduct'
            ],
            'POST' => [
                'class' => OrderController::class,
                'method' => 'postOrderProduct'
            ]
        ]
    ];

    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$uri])) {
            $routeMethods = $this->routes[$uri];
            $routeMethod = $_SERVER['REQUEST_METHOD'];

            if (isset($routeMethods[$routeMethod])) {
                $handler = $routeMethods[$routeMethod];
                $class = $handler['class'];
                $method = $handler['method'];

                if (isset($handler['request'])) {
                    $requestClass = $handler['request'];
                    $request = new $requestClass($routeMethod, $_POST);
                } else {
                    $request = new Request($routeMethod, $_POST);
                }

                $obj = new $class;
                $obj->$method($request);
            } else {
                echo "$routeMethod не поддерживается для адреса $uri!";
            }
        } else {
            require_once './../View/404.html';
        }

    }
}