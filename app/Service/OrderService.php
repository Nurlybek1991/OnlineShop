<?php

namespace Service;


use Entity\Order;
use Repository\OrderProductRepository;
use Repository\OrderRepository;
use Repository\UserProductRepository;

class OrderService
{

    private OrderRepository $orderModel;
    private OrderProductRepository $orderProductModel;
    private UserProductRepository $userProductModel;

    public function __construct()
    {
        $this->userProductModel = new UserProductRepository();
        $this->orderModel = new OrderRepository();
        $this->orderProductModel = new OrderProductRepository();
    }

    public function create(int $userId, string $firstname, string $lastname, string $country, string $city, string $address, int $postcode, int $phoneOrder, string $email): array|Order|null
    {
        $this->orderModel->create($userId, $firstname, $lastname, $country, $city, $address, $postcode, $phoneOrder, $email);
        $orderId = $this->orderModel->getOrderId();
        $this->orderProductModel->create($userId, $orderId);
        $this->userProductModel->removeAllProducts($userId);
        $orderId = $this->orderModel->getOrderId();

        return $this->orderModel->getById($orderId);
    }


}