<?php

namespace Controller;


use Repository\UserProductRepository;
use Request\AddProductRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;
use Service\CartService;

class ProductController
{
    private AuthenticationServiceInterface $authenticationService;
    private CartService $cartService;
    private UserProductRepository $userProductModel;


    public function __construct(AuthenticationServiceInterface $authenticationService)
    {

        $this->userProductModel = new UserProductRepository();
        $this->cartService = new CartService();
        $this->authenticationService = $authenticationService;

    }

    public function postAddProduct(AddProductRequest $request): void
    {
        if (!$this->authenticationService->check()) {
            header("Location: /login");
        }

        $user = $this->authenticationService->getCurrentUser();
        $userId = $user->getId();

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