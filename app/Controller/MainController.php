<?php

namespace Controller;

use Entity\User;
use Repository\ProductRepository;
use Repository\UserProductRepository;
use Repository\UserRepository;

class MainController
{
    private ProductRepository $productModel;
    private UserProductRepository $userProductModel;
    private UserRepository $userModel;

    public function __construct()
    {
        $this->userProductModel = new UserProductRepository;
        $this->productModel = new ProductRepository;
        $this->userModel = new UserRepository();
    }


    public function getMain(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $userShow = $this->userModel->getUserName($userId);

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