<?php

class ProductController
{
    private UserProduct $userProductsModel;
    private Product $productModel;
    private User $userModel;

    public function __construct()
    {
        $this->userProductsModel = new UserProduct;
        $this->productModel = new Product;
        $this->userModel = new User;
    }

    public function postAddProduct(): void
    {

        $this->userModel->checkInSession();
        $userId = $_SESSION['user_id'];

        $errors = $this->validateAddProduct($_POST);
        if (empty($errors)) {

            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $this->userProductsModel->addProduct($userId, $productId, $quantity);

            header('Location: /main');

        } else {
            require_once './../View/main.php';
        }
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


}