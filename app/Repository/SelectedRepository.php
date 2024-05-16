<?php

namespace Repository;

use Entity\Product;
use Entity\Selected;
use Entity\User;

class SelectedRepository extends Repository
{
    public function add(int $userId, int $productId): void
    {
        $stmt = self::getPdo()->prepare("INSERT INTO selected(user_id, product_id) VALUES (:user_id, :product_id)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    }

    public function delete(int $userId, int $productId): array|false
    {
        $stmt = self::getPdo()->prepare("DELETE FROM selected WHERE user_id=:user_id AND product_id=:product_id");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);

        return $stmt->fetch();
    }

    public function getAll(int $userId): array
    {
        $stmt = self::getPdo()->prepare("SELECT sel.id AS id, u.id AS user_id, u.name, u.surname,
                 u.phone, u.email, u.password, p.id AS product_id,
                 p.product_name, p.price, p.image
                   FROM selected sel
                 JOIN users u ON sel.user_id = u.id
                 JOIN products p ON sel.product_id = p.id
                 WHERE u.id = :user_id"
        );
        $stmt->execute(['user_id' => $userId]);

        $products = $stmt->fetchAll();

        $arr = [];
        foreach ($products as $product) {
            $arr[] = $this->hydrate($product);
        }
        return $arr;
    }

    public function hydrate(array $data): Selected
    {
        return new Selected($data['id'],
            new User($data['user_id'], $data['name'], $data['surname'], $data['phone'], $data['email'], $data['password']),
            new Product($data['product_id'], $data['product_name'], $data['price'], $data['image']));
    }
}