<?php

namespace Repository;

use Entity\OrderProduct;
use Entity\UserProduct;
use Entity\User;

class OrderProductRepository extends Repository
{
    public function create(int $userId, int $orderId): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO order_product (order_id, product_id)
            SELECT :order_id, product_id
            FROM user_products
            WHERE user_id = :user_id
          ");

        $stmt->execute(['user_id' => $userId, 'order_id' => $orderId]);

    }

    public function getAll(string $userId): mixed
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_product 
         JOIN orders ON orders.id = order_product.order_id
         WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch();

    }


}