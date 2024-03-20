<?php

namespace Entity;

class OrderProduct
{
    private int $id;

    private Order $order;

    private Product $userProduct;

    private int $quantity;


    public function __construct(int $id, Order $order, Product $userProduct, int $quantity)
    {
        $this->id = $id;
        $this->order = $order;
        $this->userProduct = $userProduct;
        $this->quantity = $quantity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getProduct(): Product
    {
        return $this->userProduct;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }



}