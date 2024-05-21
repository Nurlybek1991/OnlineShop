<?php

namespace Controller;

use Repository\UserProductRepository;
use Request\AddProductRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;

class CartController
{
    private CartService $cartService;
    private AuthenticationServiceInterface $authenticationService;
    private UserProductRepository $userProductModel;

    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService, UserProductRepository $userProductModel)
    {
        $this->cartService = $cartService;
        $this->authenticationService = $authenticationService;
        $this->userProductModel = $userProductModel;
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

    public function clearProduct(AddProductRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();
        $productId = $request->getProductId();

        $errors = $request->validate($userId);

        if(empty($errors)){

            $this->userProductModel->removeProduct($userId, $productId);
        }

    }

    public function removeProduct(AddProductRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();
        $productId = $request->getProductId();

        $errors = $request->validate($userId);

        if(empty($errors)){

            $this->userProductModel->removeProduct($userId, $productId);
        }

    }


}