<?php

namespace Service;

use Entity\User;
use Repository\UserProductRepository;
use Service\AuthenticationService\AuthenticationServiceInterface;

class CartService
{
    private UserProductRepository $userProductModel;
    private AuthenticationServiceInterface $authenticationService;
    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->userProductModel = new UserProductRepository();
        $this->authenticationService = $authenticationService;
    }

    public function getProducts(int $userId): array
    {
        return $this->userProductModel->getAll($userId);
    }

    public function addProduct(int $productId): void
    {
        $user = $this->authenticationService->getCurrentUser();
        if (!$user instanceof User) {
            return;
        }
        $userId = $user->getId();

        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
        if ($product) {
            $this->userProductModel->updatePlusQuantity($userId, $productId);
        } else {
            $this->userProductModel->addProduct($userId, $productId, 1);
        }
    }

    public function removeProduct(int $productId): void
    {
        $user = $this->authenticationService->getCurrentUser();
        if (!$user instanceof User) {
            return;
        }
        $userId = $user->getId();

        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
        if ($product ){
            $this->userProductModel->updateMinusQuantity($userId, $productId);
        } else {
            $this->userProductModel->addProduct($userId, $productId, 1);
        }
    }
    public function getSumPrice(int $price): float|int|string
    {
        $sum = 0;
        foreach ($price as $sumPrice) {
            $sum += $sumPrice->getProduct()->getPrice() * $sumPrice->getQuantity();
        }

        if($sum < -1 ){
            $sum = 'Сумма некорректна';
        }
        return $sum;

    }
}