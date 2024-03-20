<?php

namespace Controller;


use Repository\UserProductRepository;
use Repository\UserRepository;

class CartController
{
    private UserProductRepository $userProductModel;
    private UserRepository $userModel;

    public function __construct()
    {
        $this->userProductModel = new UserProductRepository;
        $this->userModel = new UserRepository();
    }

    public function getCart(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $userShow = $this->userModel->getUserName($userId);

        $cartProducts = $this->userProductModel->getAll($userId);
        $sumTotalCart = $this->getSumPrice($cartProducts);

        require_once './../View/cart.php';
    }

    public function getSumPrice(array $price): int|string
    {
        $sum = 0;
        foreach ($price as $sumPrice) {
            $sum += $sumPrice->getProduct()->getPrice() * $sumPrice->getQuantity();
        }

        if($sum < -1 ){
            $sum = 'Сумма некорректна';
        }
        return $sum;

    }


}