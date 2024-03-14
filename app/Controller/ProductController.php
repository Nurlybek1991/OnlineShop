<?php

namespace Controller;

use Model\UserProduct;
use Model\Product;
class ProductController
{
    private UserProduct $userProductModel;
    private Product $productModel;

    public function __construct()
    {
        $this->userProductModel = new UserProduct;
        $this->productModel = new Product;
    }

    public function postAddProduct(array $data): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $productId = $data['product_id'];
        $quantity = 1;

        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
        if ($product) {
            $this->userProductModel->updatePlusQuantity($userId, $productId);
        } else {
            $this->userProductModel->addProduct($userId, $productId, $quantity);
        }

        header("Location: /main");


    }

//    public function postRemoveProduct(array $data) :void
//    {
//        session_start();
//        if (!isset($_SESSION['user_id'])) {
//            header("Location: /login");
//        }
//
//        $userId = $_SESSION['user_id'];
//        $productId = $data['product_id'];
//
//        $errors = $this->validate($userId, $productId);
//
//        if (empty($errors)) {
//            $this->userProductModel->updateMinusQuantity($userId, $productId);
//
//            $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
//            if ($product) {
//                if ($product['quantity'] === 0) {
//                    $this->userProductModel->remove($userId, $productId);
//                }
//            }
//            header("Location: /main");
//        }
//
//            require_once './../View/main.php';
//
//    }
//
//    private function validate($userId, $productId): array
//    {
//        $errors = [];
//
//        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
//
//        if ($product) {
//            if ($product['quantity'] <= '0') {
//
//                $errors['quantity'] = 'Этого товара уже нет в корзине';
//
//            }
//        }
//        return $errors;
//    }

    public function postRemoveProduct(array $data): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $productId = $data['product_id'];
        $quantity = 1;

        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
        if ($product) {
            $this->userProductModel->updateMinusQuantity($userId, $productId);
        } else {
            $this->userProductModel->addProduct($userId, $productId, $quantity);
        }

        header('Location: /main');

    }


}