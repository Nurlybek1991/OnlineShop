<?php

namespace Controller;

use Repository\UserProductRepository;

class CartController
{
    private UserProductRepository $userProductModel;

    public function __construct()
    {
        $this->userProductModel = new UserProductRepository;
    }

    public function getCart(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];

        $cartProducts = $this->userProductModel->getAll($userId);
        $sumTotalCart = $this->getSumPrice($cartProducts);

        require_once './../View/cart.php';
    }

    public function getSumPrice(array $price): float|int|string
    {
        $sum = 0;
        foreach ($price as $sumPrice) {
            $sum += $sumPrice['price'] * $sumPrice['quantity'];
        }

        if($sum < -1){
            $sum = 'Сумма некорректна';
        }
        return $sum;

    }

    public function deleteItem(array $data)
    {


        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $productId = $data['product_id'];

        $this->userProductModel->getByUserIdProductId($userId, $productId);
        $this->userProductModel->remove($userId, $productId);
    }

}