<?php

use Controller\CartController;
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Controller\UserController;

use Core\Container;

use Repository\ProductRepository;
use Repository\UserRepository;

use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\AuthenticationService\AuthenticationSessionService;
use Service\CartService;

return [

    UserController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $userModel = new UserRepository();

        return new UserController($authenticationService, $userModel);
    },

    ProductController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);

        return new ProductController($authenticationService, $cartService);
    },

    MainController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);
        $productModel = new ProductRepository();

        return new MainController($authenticationService, $cartService, $productModel);
    },

    CartController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);

        return new CartController($authenticationService, $cartService);
    },

    OrderController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);
        $orderService = $container->get(OrderController::class);

        return new OrderController($authenticationService, $cartService, $orderService);
    },

    AuthenticationServiceInterface::class => function () {
        return new AuthenticationSessionService();
    }

];