<?php

class UserProduct extends Model
{
    public function addProduct(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

    public function getByUserIdProductId(int $userId, int $productId): mixed
    {

        $stmt = $this->pdo->prepare("SELECT user_id, product_id FROM user_products WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        return $stmt->fetch();
    }

    public function updateQuantity(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("UPDATE user_products SET quantity = (quantity + :quantity) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);
    }

    public function getAll(string $userId): array
    {
        $stmt = $this->pdo->prepare("SELECT name, image, price, user_products.quantity FROM products INNER JOIN user_products ON (products.id = user_products.product_id) WHERE (user_id =:user_id)");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }


}
