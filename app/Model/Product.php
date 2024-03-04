<?php
require_once './../Model/Model.php';
class Product
{

//    Вывести продукты по Id
    public function getProductById($id)
    {
        $pdo = new Model();
        $statement = $pdo->getPDO()->prepare("SELECT * FROM products WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

//    Вывести все продукты
    public function getAllProduct(): false|array
    {

        $pdo = new Model();
        $stmt = $pdo->getPDO()->query('SELECT * FROM products');
        return $stmt->fetchAll();


    }


}