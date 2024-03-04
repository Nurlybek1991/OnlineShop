<?php

require_once './../Model/Product.php';
require_once './../Model/UserProduct.php';
class ProductController
{

    public function getAddProduct(): void
    {
        require_once './../View/addProduct.php';
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

            $addUserProducts = new UserProduct();
            $addUserProducts->addUserProducts($userId, $productId, $quantity);

            header('Location: /cart');
//            echo 'Успешно добавлен продукт!';
        } else {
            require_once './../View/addProduct.php';
        }
    }

    private function validateAddProduct($data): array
    {

        $errors = [];

        if (isset($data['product_id'])) {
            $productId = $data['product_id'];

            $getProduct = new Product();
            if (empty($getProduct->getProductById($productId))) {
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

    public function getCart()
    {
        require_once './../View/cart.php';
    }


}