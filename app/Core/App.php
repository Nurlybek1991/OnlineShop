<?php

namespace Core;

use Request\Request;


class App
{
    private Container $container;
    private array $routes = [];

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];


        try {
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

                    $obj = $this->container->get($class);
                    $obj->$method($request);

                } else {
                    echo "$routeMethod не поддерживается для адреса $uri!";
                }
            } else {
                require_once './../View/404.html';
            }
        } catch (\Throwable $exception) {

            $loggerService = $this->container->get(LoggerInterface::class);

            $data = ['message' => 'message: ' . $exception->getMessage(),
                'file' => 'file: ' . $exception->getFile(),
                'line' => 'line: ' . $exception->getLine(),
                ];

            $loggerService->error('The server cannot process the request: ', $data);

            require_once '../View/500.html';
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

    public function post($routeName, $className, $method, $request = null): void
    {
        $this->routes[$routeName]['POST'] = [
            'class' => $className,
            'method' => $method,
            'request' => $request
        ];
    }


}