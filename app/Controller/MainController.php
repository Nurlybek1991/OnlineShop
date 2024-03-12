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

        $cartProducts = $this->userProductModel->getAll($userId);


        foreach ($cartProducts as $cartProduct) {
            $sumQuantity[] = $cartProduct['quantity'];
            $totalQuantity = array_sum($sumQuantity);
        }

        $sumAllProducts = $this->userProductModel->getAll($userId);

        foreach ($sumAllProducts as $sumAllProduct) {
            $sumPrice[] = $sumAllProduct['price'] * $sumAllProduct['quantity'];
            $sumTotalCart = array_sum($sumPrice);
        }

        require_once './../View/main.php';
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_destroy();

            header("Location: /login");
        }
    }


}