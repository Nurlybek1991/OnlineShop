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
        $this->authenticationService = $authenticationService;
        $this->userProductModel = new UserProductRepository();
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
        if ($product) {
            $this->userProductModel->updateMinusQuantity($userId, $productId);
        } else {
            $this->userProductModel->addProduct($userId, $productId, 1);
        }
    }

    public function getSumPrice(array $price): float|int|string
    {
        $sum = 0;

        foreach ($price as $sumPrice) {
            $sum += $sumPrice->getProduct()->getPrice() * $sumPrice->getQuantity();
        }
        if ($sum <= 0) {
            $sum = 'должна быть больше 0';
        }

        return $sum;

    }

    public function getSumQuantity(array $sumQuantity): int|string
    {
        $totalQuantity = 0;

        foreach ($sumQuantity as $sumTotalQuantity) {
            $totalQuantity += $sumTotalQuantity->getQuantity();
        }

        if ($totalQuantity <= -1) {
            $totalQuantity = 'Укажите больше 0';
        }
        return $totalQuantity;


    }
}