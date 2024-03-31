<?php

namespace Service;

use Repository\OrderProductRepository;
use Repository\OrderRepository;
use Repository\Repository;
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

    /**
     * @throws Throwable
     */
    public function create(int $userId, string $firstname, string $lastname, string $country, string $city, string $address, int $postcode, int $phoneOrder, string $email)
    {
        $pdo = Repository::getPdo();
        $pdo->beginTransaction();

        try {
            $this->orderModel->create($userId, $firstname, $lastname, $country, $city, $address, $postcode, $phoneOrder, $email);
            $orderId = $this->orderModel->getOrderId();
            $orderProducts = $this->orderProductModel->create($userId, $orderId);
            $this->userProductModel->removeAllProducts($userId);

            return $orderProducts;

        } catch (\Throwable $exception) {
            echo $exception->getMessage();
            $pdo->rollBack();
        }

        $pdo->commit();

    }
}