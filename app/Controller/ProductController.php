<?php

namespace Controller;

use Request\AddProductRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;

class ProductController
{
    private AuthenticationServiceInterface $authenticationService;
    private CartService $cartService;

    public function __construct(AuthenticationServiceInterface $authenticationService, CartService $cartService)
    {
        $this->authenticationService = $authenticationService;
        $this->cartService = $cartService;
    }

    public function postAddProduct(AddProductRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $userId = $this->authenticationService->getCurrentUser()->getId();


        $errors = $request->validate($userId);

        if (empty($errors)) {
            $productId = $request->getProductId();

            $this->cartService->addProduct($productId);

            header("Location: /main");

        }

        require_once './../View/main.php';

    }

    public function postRemoveProduct(AddProductRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }
        $user = $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

        $errors = $request->validate($userId);
        if (empty($errors)) {
            $productId = $request->getProductId();

            $this->cartService->removeProduct($productId);

            header("Location: /main");
        }
        require_once './../View/main.php';

    }


}