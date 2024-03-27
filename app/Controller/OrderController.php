<?php

namespace Controller;

use Repository\UserProductRepository;
use Request\OrderRequest;
use Service\AuthenticationService\AuthenticationService;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;
use Service\OrderService;

class OrderController
{
    private UserProductRepository $userProductModel;
    private OrderService $orderService;
    private CartService $cartService;
    private  AuthenticationServiceInterface $authenticationService;


    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->cartService = new CartService();
        $this->userProductModel = new UserProductRepository();
        $this->orderService = new OrderService();
        $this->authenticationService = $authenticationService;


    }

    public function getOrder(): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }
        $userId = $this->authenticationService->getCurrentUser()->getId();

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
            $country = $data['country'];
            $address = $data['address'];
            $city = $data['city'];
            $postcode = $data['postcode'];
            $phoneOrder = $data['phoneOrder'];
            $email = $data['email'];

             $this->orderService->create($userId, $firstname, $lastname, $country, $address, $city, $postcode ,$phoneOrder, $email);

            header('location:/orderProduct');

        }

        require_once './../View/order.php';
    }

}