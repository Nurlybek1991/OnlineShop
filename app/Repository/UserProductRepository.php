<?php

namespace Repository;

use Entity\UserProduct;
use Entity\User;
use Entity\Product;

class UserProductRepository extends Repository
{
    public function addProduct(int $userId, int $productId, int $quantity): void
    {

        $stmt = self::getPdo()->prepare("INSERT INTO user_products (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);

    }

    public function getAll(string $userId): array|null
    {

        $stmt = self::getPdo()->prepare("SELECT up.id AS id, u.id AS user_id, u.name,u.surname,
                 u.phone,u.email,u.password,p.id AS product_id,
                 p.product_name,p.price,p.image,up.quantity
        FROM user_products up
                 JOIN users u ON up.user_id = u.id
                 JOIN products p ON up.product_id = p.id
                 WHERE user_id = :user_id"
        );
        $stmt->execute(['user_id' => $userId]);
        $userProducts = $stmt->fetchAll();

        if (empty(!$userProducts)) {
            return null;
        }

        $arr = [];
        foreach ($userProducts as $userProduct) {

            $arr[] =  $this->hydrate($userProduct);
        }

        return $arr;



    }


    public function getByUserIdProductId(int $userId, int $productId): UserProduct|null
    {

        $stmt = self::getPdo()->prepare("SELECT up.id AS id, u.id AS user_id, u.name,u.surname,
                 u.phone,u.email,u.password,p.id AS product_id,
                 p.product_name,p.price,p.image,up.quantity
        FROM user_products up
                JOIN users u ON up.user_id = u.id
                JOIN products p ON up.product_id = p.id
                WHERE user_id = :user_id
                AND product_id = :product_id"
        );
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
        $userProduct = $stmt->fetch();
//        var_dump($userProduct);die;
        if (empty($userProduct)) {
            return null;
        }

        return $this->hydrate($userProduct);

    }


    public function updatePlusQuantity(int $userId, int $productId): void
    {

        $stmt = self::getPdo()->prepare("UPDATE user_products SET quantity = (quantity + 1) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    public function updateMinusQuantity(int $userId, int $productId): void
    {

        $stmt = self::getPdo()->prepare("UPDATE user_products SET quantity = (quantity - 1) WHERE (user_id = :user_id AND product_id = :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    public function removeAllProducts(int $userId): void
    {
        $statement = self::getPdo()->prepare('DELETE FROM user_products WHERE user_id = :user_id');
        $statement->execute(['user_id' => $userId]);
    }

    public function removeProduct(int $userId, int $productId): void
    {
        $stmt = self::getPdo()->prepare("DELETE FROM user_products WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    private function hydrate(array $data): UserProduct
    {
        return new UserProduct($data['id'],
            new User($data['user_id'], $data['name'], $data['surname'], $data['phone'], $data['email'], $data['password']),
            new Product($data['product_id'], $data['product_name'], $data['price'], $data['image']),
            $data['quantity']);
    }


}
