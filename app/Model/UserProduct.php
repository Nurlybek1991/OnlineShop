<?php
require_once './../Model/Model.php';

class UserProduct
{
//    Добавление продуктов пользователями
    public function addUserProducts(int $userId, int $productId,int $quantity): void
    {
        $pdo = new Model();
        $stmt = $pdo->getPDO()->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);
    }

}