<?php

namespace Entity;

class OrderProduct
{
    private int $id;

    private int $orderId;

    private int $productId;

    private int $quantity;


    public function __construct(int $id, int $orderId, int $productId, int $quantity)
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }



}