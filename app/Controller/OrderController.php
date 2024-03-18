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
            $order = $this->orderModel->getByUserId($userId);
            $cartProducts = $this->userProductModel->getAllProduct();

//            var_dump($cartProducts);die;

            foreach ($cartProducts as $product) {
                $productId = $product['product_id'];
                $quantity = $product['quantity'];
                $this->orderProductModel->create((int)$order, (int)$productId, (int)$quantity);
            }

            header('location:/orderProduct');

        }

        require_once './../View/order.php';
    }


    public function getOrderProduct()
    {


        require_once './../View/orderProduct.php';
    }

    public function postOrderProduct(array $data)
    {

    }

}