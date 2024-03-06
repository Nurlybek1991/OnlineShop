<?php
class MainController
{
    public function getMain(): void
    {

        $userModel = new User();
        $userModel->checkInSession();

        $productModel = new Product();
        $products = $productModel->getAll();

        require_once './../View/main.php';
    }

}