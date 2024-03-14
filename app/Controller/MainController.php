<?php

namespace Controller;

use Model\Product;
use Model\UserProduct;

class MainController
{
    private Product $productModel;
    private UserProduct $userProductModel;

    public function __construct()
    {
        $this->userProductModel = new UserProduct;
        $this->productModel = new Product;
    }

    public function getMain(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];

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
            $sum += $sumPrice['price'] * $sumPrice['quantity'];
        }
        if ($sum <= -1) {
            $sum = 'должна быть больше 0';
        }

        return $sum;

    }

    public function getSumQuantity(array $sumQuantity)
    {
        $totalQuantity = 0;

        foreach ($sumQuantity as $sumTotalQuantity) {
            $totalQuantity += $sumTotalQuantity['quantity'];
        }

        if ($totalQuantity <= -1) {
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