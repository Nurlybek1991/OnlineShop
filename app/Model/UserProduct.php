<?php
namespace Model;
class UserProduct extends Model
{
    public function addProduct(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

    public function getByUserIdProductId(int $userId, int $productId): array|bool
    {

        $stmt = $this->pdo->prepare("SELECT user_id, product_id FROM user_products WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        return $stmt->fetch();
    }

    public function updatePlusQuantity(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("UPDATE user_products SET quantity = (quantity + :quantity) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);
    }

    public function updateMinusQuantity(int $userId, int $productId2, int $quantity): void
    {

        $stmt = $this->pdo->prepare("UPDATE user_products SET quantity = (quantity - :quantity) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId2, 'quantity' => $quantity]);
    }

    public function getAll(string $userId): array|null
    {
        $stmt = $this->pdo->prepare("SELECT name, image, price, user_products.quantity FROM products INNER JOIN user_products ON (products.id = user_products.product_id) WHERE (user_id =:user_id)");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function remove(int $userId,int $productId)
    {
        $stmt = $this->pdo->prepare(query: "DELETE FROM user_products WHERE product_id = :product_id AND user_id = :user_id ");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        return $stmt->fetch();
    }


}
