<?php

namespace Repository;

class OrderProductRepository extends Repository
{
    public function create(int $orderId, int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO order_product (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
        $stmt->execute(['order_id' => $orderId,  'product_id' => $productId, 'quantity' => $quantity]);

    }

}