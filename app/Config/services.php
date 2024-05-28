<?php

use Controller\CartController;
use Controller\CommentController;
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Controller\SelectedController;
use Controller\UserController;

use Core\Container;
use Core\Logger;
use Core\LoggerInterface;

use Repository\CommentRepository;
use Repository\OrderProductRepository;
use Repository\OrderRepository;
use Repository\ProductRepository;
use Repository\SelectedRepository;
use Repository\UserProductRepository;
use Repository\UserRepository;

use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\AuthenticationService\AuthenticationSessionService;
use Service\CartService;
use Service\CommentService;
use Service\OrderService;
use Service\SelectedService;

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
        $userProductModel = $container->get(UserProductRepository::class);

        return new CartController($authenticationService, $cartService, $userProductModel);
    },

    OrderController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);
        $orderService = $container->get(OrderService::class);

        return new OrderController($authenticationService, $cartService, $orderService);
    },

    SelectedController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $selectedService = $container->get(SelectedService::class);
        $selectedModel = $container->get(SelectedRepository::class);

        return new SelectedController($authenticationService, $selectedService, $selectedModel);
    },

    CommentController::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $cartService = $container->get(CartService::class);
        $commentModel = $container->get(CommentRepository::class);

        return new CommentController($authenticationService, $cartService, $commentModel);
    },

    CartService::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $userProductModel = $container->get(UserProductRepository::class);
        $productModel = new ProductRepository();

        return new CartService($authenticationService, $userProductModel,$productModel);
    },

    OrderService::class => function (Container $container) {
        $userProductModel = new UserProductRepository();
        $orderModel = $container->get(OrderRepository::class);
        $orderProductModel = $container->get(OrderProductRepository::class);

        return new OrderService($userProductModel, $orderModel, $orderProductModel);
    },

    SelectedService::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $selectedModel = new SelectedRepository();

        return new SelectedService($authenticationService, $selectedModel);
    },

    CommentService::class => function (Container $container) {
        $authenticationService = $container->get(AuthenticationServiceInterface::class);
        $commentModel = new CommentRepository();

        return new CommentService($authenticationService, $commentModel);
    },

    AuthenticationServiceInterface::class => function (Container $container) {
        $userModel = $container->get(UserRepository::class);

        return new AuthenticationSessionService($userModel);

    },

    LoggerInterface::class => function () {

        return new Logger();
    },

];