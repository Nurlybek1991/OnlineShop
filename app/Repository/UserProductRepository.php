<?php
namespace Repository;

use Entity\UserProduct;

class UserProductRepository extends Repository
{
    public function addProduct(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

    public function getByUserIdProductId(int $userId, int $productId): UserProduct|null
    {

        $stmt = $this->pdo->prepare("SELECT user_id, product_id FROM user_products WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        $userIdAndProductId =  $stmt->fetch();

        if(empty($userIdAndProductId)){
            return null;
        }

        return $this->hydrate($userIdAndProductId);

    }

    public function hydrate(array $data): UserProduct
    {
        return new UserProduct($data['id'],$data['user_id'],$data['product_id'],$data['quantity']);
    }


    public function updatePlusQuantity(int $userId, int $productId): void
    {

        $stmt = $this->pdo->prepare("UPDATE user_products SET quantity = (quantity + 1) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    public function updateMinusQuantity(int $userId, int $productId): void
    {

        $stmt = $this->pdo->prepare("UPDATE user_products SET quantity = (quantity - 1) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    public function getAll(string $userId): array|null
    {
        $stmt = $this->pdo->prepare("SELECT name, image, price, user_products.quantity FROM products INNER JOIN user_products ON (products.id = user_products.product_id) WHERE (user_id =:user_id)");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function getAllProduct(): false|array
    {
        $stmt = $this->pdo->query('SELECT * FROM user_products');
        return  $stmt->fetchAll();
    }

    public function remove(int $userId,int $productId)
    {
        $stmt = $this->pdo->prepare(query: "DELETE FROM user_products WHERE product_id = :product_id AND user_id = :user_id ");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        return $stmt->fetch();
    }


}