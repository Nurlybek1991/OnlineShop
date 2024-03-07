<?php

class CartController
{
    public function getCart(): void
    {

        $userModel = new User();
        $userModel->checkInSession();
        $userId = $_SESSION['user_id'];

        $userProductModel = new UserProduct();
        $cartProducts = $userProductModel->getAll($userId);
        if(empty($cartProducts)){
            header("Location: /main");
        }
        foreach ($cartProducts as $cartProduct) {
            $sumPrice[] = $cartProduct['price'] * $cartProduct['quantity'];
            $sumTotalCart = array_sum($sumPrice);
        }

        require_once './../View/cart.php';
    }

}