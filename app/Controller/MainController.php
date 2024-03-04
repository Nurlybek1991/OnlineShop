<?php
require_once './../Model/Model.php';
require_once './../Model/Product.php';
class MainController
{
//    Проверка пользователя и выдача главной страницы
    public function getMain(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('location:/login');
        }

        $getAllProduct = new Product();
        $products = $getAllProduct->getAllProduct();

        if (empty($products)) {
            echo 'Продуктов нет!';
            die();
        }
        require_once './../View/main.php';
    }

}