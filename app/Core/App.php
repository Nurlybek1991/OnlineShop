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
use Service\AuthenticationService\AuthenticationCookieService;
use Service\AuthenticationService\AuthenticationSessionService;


class App
{
    private array $routes = [];

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

                $authService = new AuthenticationSessionService();
//                $authService = new AuthenticationCookieService();

                $obj = new $class($authService);
                $obj->$method($request);
            } else {
                echo "$routeMethod не поддерживается для адреса $uri!";
            }
        } else {
            require_once './../View/404.html';
        }

    }

    public function get($routeName, $className, $method, $request = null): void
    {
        $this->routes[$routeName]['GET'] = [
            'class' => $className,
            'method' => $method,
            'request' => $request
        ];
    }

    public function post($routeName, $className, $method,$request = null): void
    {
        $this->routes[$routeName]['POST'] = [
            'class' => $className,
            'method' => $method,
            'request' => $request
        ];
    }


}