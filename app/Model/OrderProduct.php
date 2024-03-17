<?php

namespace Model;

class OrderProduct extends Model
{

    public function create(int $orderId,int $productId, int $quantity): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO order_product (product_id, order_id, quantity) VALUES (:product_id, :order_id, :quantity)");
        $stmt->execute(['product_id' => $productId, 'order_id' => $orderId,  'quantity' => $quantity]);

    }



}