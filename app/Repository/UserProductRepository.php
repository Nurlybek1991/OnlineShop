<?php

namespace Repository;

use Entity\UserProduct;
use Entity\User;
use Entity\Product;

class UserProductRepository extends Repository
{
    public function addProduct(int $userId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

    public function getByUserIdProductId(int $userId, int $productId): UserProduct|null
    {

        $stmt = $this->pdo->prepare("SELECT * FROM user_products 
     JOIN products ON (products.id = user_products.product_id)
     JOIN users ON (users.id = user_products.user_id)  
     WHERE (user_id = :user_id AND product_id = :product_id)
     ");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        $userIdAndProductId = $stmt->fetch();

        if (empty($userIdAndProductId)) {
            return null;
        }

        return $this->hydrate($userIdAndProductId);

    }

    public function hydrate(array $data): UserProduct
    {
        return new UserProduct($data['id'],
            new User($data['id'], $data['name'], $data['surname'], $data['phone'], $data['email'], $data['password']),
            new Product($data['id'],$data['product_name'],$data['price'],$data['image']),
            $data['quantity']);
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

        $stmt = $this->pdo->prepare("SELECT * FROM user_products 
     JOIN products ON (products.id = user_products.product_id)
     JOIN users ON (users.id = user_products.user_id)                                                      
     WHERE (user_id =:user_id)
   ");
         $stmt->execute(['user_id' => $userId]);
        $userProducts = $stmt->fetchAll();

        if (!$userProducts){
            return [];
        }

        $userProductsArr = [];

        foreach ($userProducts as $userProduct){
            $userProductsArr[] = $this->hydrate($userProduct);
        }

        return $userProductsArr;

    }

    public function getAllProduct(): false|array
    {
        $stmt = $this->pdo->query('SELECT * FROM user_products');
        return $stmt->fetchAll();
    }


    public function removeAllProducts(int $userId): void
    {
        $statement = $this->pdo->prepare('DELETE FROM user_products WHERE user_id = :user_id');
        $statement->execute(['user_id' => $userId]);
    }

    public function remove(int $userId, $productId): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM user_products WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }


}
