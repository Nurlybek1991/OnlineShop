<?php

class ProductController
{
    private UserProduct $userProductModel;
    private Product $productModel;

    public function __construct()
    {
        $this->userProductModel = new UserProduct;
        $this->productModel = new Product;
    }

    public function postAddProduct(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        $userId = $_SESSION['user_id'];

        $errors = $this->validateAddProduct($_POST);
        if (empty($errors)) {

            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            if ($this->userProductModel->getByUserIdProductId($userId, $productId)) {
                $this->userProductModel->updatePlusQuantity($userId, $productId, $quantity);
            } else {
                $this->userProductModel->addProduct($userId, $productId, $quantity);
            }


            header('Location: /main');
        }

        require_once './../View/main.php';
    }

    private function validateAddProduct(array $data): array
    {

        $errors = [];


        if (isset($data['product_id'])) {
            $productId = $data['product_id'];
            if (empty($this->productModel->getById($productId))) {
                $errors['product_id'] = 'Такого продукта нет.';
            }
        } else {
            $errors['product_id'] = 'Введите продукты в поле.';
        }


        if (isset($data["quantity"])) {
            $quantity = $data['quantity'];
            if (empty($quantity)) {
                $errors['quantity'] = 'Пустое поле.';
            } elseif ($quantity <= 0) {
                $errors['quantity'] = 'Укажите количество больше 0.';
            }
        } else {
            $errors['quantity'] = 'Введите количество в поле.';
        }

        return $errors;
    }

    public function postRemoveProduct(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        $userId = $_SESSION['user_id'];

        $errors = $this->validateAddProduct($_POST);
        if (empty($errors)) {

            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            if ($this->userProductModel->getByUserIdProductId($userId, $productId)) {
                $this->userProductModel->updateMinusQuantity($userId, $productId, $quantity);
            } else {
                $this->userProductModel->addProduct($userId, $productId, $quantity);
            }
            header('Location: /main');

        }

        require_once './../View/main.php';
    }
}