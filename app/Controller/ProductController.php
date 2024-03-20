<?php

namespace Controller;

use Repository\UserProductRepository;
use Repository\ProductRepository;
use Request\AddProductRequest;
use Request\Request;

class ProductController
{
    private UserProductRepository $userProductModel;
    private ProductRepository $productModel;


    public function __construct()
    {
        $this->userProductModel = new UserProductRepository;
        $this->productModel = new ProductRepository;

    }

    public function postAddProduct(AddProductRequest $request): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $errors = $request->validate();
        if (empty($errors)) {
            $data = $request->getBody();
            $userId = $_SESSION['user_id'];
            $productId = $data['product_id'];
            $quantity = 1;

            $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
            if ($product) {
                $this->userProductModel->updatePlusQuantity($userId, $productId);
            } else {
                $this->userProductModel->addProduct($userId, $productId, $quantity);
            }
        }
        header("Location: /main");

    }

    public function postRemoveProduct(AddProductRequest $request): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        $errors = $request->validate();
        if (empty($errors)) {
            $data = $request->getBody();
            $userId = $_SESSION['user_id'];
            $productId = $data['product_id'];
            $quantity = 1;

            $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
            var_dump($product);die;
            if ($produc ){
                $this->userProductModel->updateMinusQuantity($userId, $productId);
            } else {
                $this->userProductModel->addProduct($userId, $productId, $quantity);
            }
        }
        header('Location: /main');

    }


}