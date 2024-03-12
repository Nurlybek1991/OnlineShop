<?php

namespace Core;

use Controller\CartController;
use Controller\MainController;
use Controller\ProductController;
use Controller\UserController;


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
            ]
        ],
        '/removeProduct' => [
            'POST' => [
                'class' => ProductController::class,
                'method' => 'postRemoveProduct',
            ]
        ],
        '/cart' => [
            'GET' => [
                'class' => CartController::class,
                'method' => 'getCart'
            ]
        ],
    ];
//    private array $routes = [
//        '/registrate' => [
//            'GET' => [
//                'class' => 'UserController',
//                'method' => 'getRegistrate',
//            ],
//            'POST' => [
//                'class' => 'UserController',
//                'method' => 'postRegistrate',
//            ]
//        ],
//        '/login' => [
//            'GET' => [
//                'class' => 'UserController',
//                'method' => 'getLogin',
//            ],
//            'POST' => [
//                'class' => 'UserController',
//                'method' => 'postLogin',
//            ]
//        ],
//        '/main' => [
//            'GET' => [
//                'class' => 'MainController',
//                'method' => 'getMain',
//            ],
//            'POST' => [
//                'class' => 'ProductController',
//                'method' => 'postAddProduct',
//            ]
//        ],
//        '/removeProduct' => [
//            'POST' => [
//                'class' => 'ProductController',
//                'method' => 'postRemoveProduct',
//            ]
//        ],
//        '/cart' => [
//            'GET' => [
//                'class' => 'CartController',
//                'method' => 'getCart',
//            ]
//        ],
//    ];

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

                $obj = new $class;
                $obj->$method($_POST);
            } else {
                echo "$routeMethod не поддерживается для адреса $uri!";
            }
        } else {
            require_once './../View/404.html';
        }

    }
}