<?php

namespace Controller;

use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;

class CartController
{
    private CartService $cartService;

    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->authenticationService = $authenticationService;
    }

    public function getCart(): void
    {

        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $user = $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

        $cartProducts = $this->cartService->getProducts($userId);
        $sumTotalCart = $this->cartService->getSumPrice($cartProducts);

        require_once './../View/cart.php';
    }

}