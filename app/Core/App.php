<?php

class App
{
    public function run(): void
    {

        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($uri === '/registrate') {
            $obj = new UserController();
            if ($method === 'GET') {
                $obj->getRegistrate();
            } elseif ($method === 'POST') {
                $obj->postRegistrate();
            } else {
                echo "$uri не поддерживается для адреса $method!";
            }
        } elseif ($uri === '/login') {
            $obj = new UserController();
            if ($method === 'GET') {
                $obj->getLogin();
            } elseif ($method === 'POST') {
                $obj->postLogin();
            } else {
                echo "$uri не поддерживается для адреса $method!";
            }
        } elseif ($uri === '/main') {
            $obj = new MainController();
            if ($method === 'GET') {
                $obj->getMain();
            } elseif ($method === 'POST') {
                $obj = new ProductController();
                $obj->postAddProduct();
            } else {
                echo "$uri не поддерживается для адреса $method!";
            }
        } elseif ($uri === '/removeProduct') {
            $obj = new ProductController();
            if ($method === 'POST') {
                $obj->postRemoveProduct();
            } else {
                echo "$uri не поддерживается для адреса $method!";
            }
        } elseif ($uri === '/cart') {
            $obj = new CartController();
            if ($method === 'GET') {
                $obj->getCart();
            }  else {
                echo "$method не поддерживается для адреса $uri!";
            }
        } else {
            require_once './../View/404.html';
        }
    }
}