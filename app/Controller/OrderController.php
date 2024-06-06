<?php

namespace Controller;

use Request\OrderRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;
use Service\OrderService;

class OrderController
{

    private OrderService $orderService;
    private CartService $cartService;
    private AuthenticationServiceInterface $authenticationService;


    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService, OrderService $orderService)
    {
        $this->authenticationService = $authenticationService;
        $this->cartService = $cartService;
        $this->orderService = $orderService;

    }

    public function getOrder(): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }
        $userId = $this->authenticationService->getCurrentUser()->getId();

        $orderProducts = $this->cartService->getProducts($userId);
        $totalPrice = $this->cartService->getSumPrice($orderProducts);

        require_once './../View/order.php';
    }

    public function postOrder(OrderRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();

        $errors = $request->validate();

        if (empty($errors)) {

            $firstname = $request->getFirstname();
            $lastname = $request->getLastname();
            $country = $request->getCountry();
            $address = $request->getAddress();
            $city = $request->getCity();
            $postcode = $request->getPostcode();
            $phoneOrder = $request->getPhoneOrder();
            $email = $request->getEmail();

            $this->orderService->create($userId, $firstname, $lastname, $country, $address, $city, $postcode, $phoneOrder, $email);

            header("location:/orderProduct");

        }

        require_once './../View/order.php';
    }

    public function getOrderProduct()
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $user = $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

        $orderProducts = $this->cartService->getProducts($userId);

        require_once './../View/orderProduct.php';
    }
}