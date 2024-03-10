<?php

class CartController
{
    private UserProduct $userProductModel;

    public function __construct()
    {
        $this->userProductModel = new UserProduct;
    }
    public function getCart(): void
    {

        session_start();
        if (!isset($_SESSION['user_id'] )) {
            header("Location: /login");
        }
        $userId = $_SESSION['user_id'];

        $cartProducts = $this->userProductModel->getAll($userId);
        if(empty($cartProducts)){
            echo 'Корзина пустая!';
            require_once './../View/cart.php';
        }

        foreach ($cartProducts as $cartProduct) {
            $sumPrice[] = $cartProduct['price'] * $cartProduct['quantity'];
            $sumTotalCart = array_sum($sumPrice);
        }

        require_once './../View/cart.php';
    }


}