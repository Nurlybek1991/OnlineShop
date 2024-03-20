<?php

namespace Controller;

use Repository\OrderRepository;
use Repository\OrderProductRepository;
use Repository\UserRepository;
use Repository\UserProductRepository;
use Request\OrderRequest;

class OrderController
{
    private OrderRepository $orderModel;
    private UserRepository $userModel;
    private UserProductRepository $userProductModel;
    private OrderProductRepository $orderProductModel;

    public function __construct()
    {
        $this->orderModel = new OrderRepository;
        $this->userProductModel = new UserProductRepository;
        $this->userModel = new UserRepository;
        $this->orderProductModel = new OrderProductRepository;

    }

    public function getOrder(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        $userId = $_SESSION['user_id'];
        $userShow = $this->userModel->getUserName($userId);
        require_once './../View/order.php';
    }

    public function postOrder(OrderRequest $request): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $errors = $request->validate();

        if (empty($errors)) {
            $userId = $_SESSION['user_id'];
            $data = $request->getBody();
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $phoneOrder = $data['phoneOrder'];
            $email = $data['email'];
            $country = $data['country'];
            $address = $data['address'];
            $city = $data['city'];
            $postcode = $data['postcode'];


            $this->orderModel->create($userId, $firstname, $lastname, $phoneOrder, $email, $postcode, $country, $city, $address);
            $orderId = $this->orderModel->getOrderId();
            $this->orderProductModel->create($userId, $orderId);
            $this->userProductModel->removeAllProducts($userId);

            header('location:/orderProduct');

        }

        require_once './../View/order.php';
    }

    public function getOrderProduct(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        $userId = $_SESSION['user_id'];
        $orderInfos = $this->orderModel->getAll($userId);
        $orderProducts = $this->orderProductModel->getAll($userId);
//        var_dump($orderInfos);die;
        require_once './../View/orderProduct.php';
    }


}