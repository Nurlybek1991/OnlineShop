<?php
require_once './../Model/Model.php';
class UserProducts extends Model
{
    public function addProductsByUser(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

}
