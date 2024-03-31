<?php

namespace Repository;

class OrderProductRepository extends Repository
{
    public function create(int $userId, int $orderId): void
    {

        $stmt = self::getPdo()->prepare("INSERT INTO order_product (order_id, product_id)
            SELECT :order_id, product_id
            FROM user_products
            WHERE user_id = :user_id
          ");

        $stmt->execute(['user_id' => $userId, 'order_id' => $orderId]);

    }


}