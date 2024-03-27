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

    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->cartService = new CartService();
        $this->productModel = new ProductRepository();
        $this->authenticationService = $authenticationService;
    }

    public function getMain(): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $user= $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

        $products = $this->productModel->getAll();

        $allProducts = $this->userProductModel->getAll($userId);
        $totalQuantity = $this->getSumQuantity($allProducts);
        $sumPrice = $this->getSumPrice($allProducts);

        require_once './../View/main.php';

    }

    public function getSumPrice(array $price): float|int|string
    {
        $sum = 0;

        foreach ($price as $sumPrice) {
            $sum += $sumPrice->getProduct()->getPrice() * $sumPrice->getQuantity();
        }
        if ($sum <= 0 ) {
            $sum = 'должна быть больше 0';
        }

        return $sum;

    }

    public function getSumQuantity(array $sumQuantity): int|string
    {
        $totalQuantity = 0;

        foreach ($sumQuantity as $sumTotalQuantity) {
            $totalQuantity += $sumTotalQuantity->getQuantity();
        }

        if ($totalQuantity <= -1 ) {
            $totalQuantity = 'Укажите больше 0';
        }
        return $totalQuantity;


    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_destroy();

            header("Location: /login");

        }
    }


}