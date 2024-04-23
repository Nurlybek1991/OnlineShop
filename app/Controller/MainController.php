<?php

namespace Controller;

use Repository\ProductRepository;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;

class MainController
{
    private ProductRepository $productModel;
    private CartService $cartService;
    private AuthenticationServiceInterface $authenticationService;


    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService, ProductRepository $productModel)
    {
        $this->authenticationService = $authenticationService;
        $this->cartService = $cartService;
        $this->productModel = $productModel;

    }

    public function getMain(): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $user = $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

        $products = $this->productModel->getAll();

        $allProducts = $this->cartService->getProducts($userId);
        $totalQuantity = $this->cartService->getSumQuantity($allProducts);
        $sumPrice = $this->cartService->getSumPrice($allProducts);

        require_once './../View/main.php';

    }

    public function logout(): void
    {
        $this->authenticationService->logout();
        header("Location: /login");
    }


}