<?php

namespace Service;

use Entity\User;
use Repository\ProductRepository;
use Repository\UserProductRepository;
use Service\AuthenticationService\AuthenticationServiceInterface;

class CartService
{
    private UserProductRepository $userProductModel;
    private ProductRepository $productModel;
    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService, UserProductRepository $userProductModel, ProductRepository $productModel)
    {
        $this->authenticationService = $authenticationService;
        $this->userProductModel = $userProductModel;
        $this->productModel = $productModel;
    }

    public function getProducts(int $userId): array
    {
        return $this->userProductModel->getAll($userId);
    }

    public function getProduct(int $id)
    {
        return $this->productModel->getById($id);
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
        $this->userProductModel->updateMinusQuantity($userId, $productId);

        $product = $this->userProductModel->getByUserIdProductId($userId, $productId);
        if ($product) {
            if ($product->getQuantity() === 0) {
                $this->userProductModel->removeProduct($userId, $productId);
            }
        }
    }

    public function remove(int $userId, int $productId): void
    {
        $this->userProductModel->removeProduct($userId, $productId);

    }

    public function getSumPrice(array $price): float|int|string
    {
        $sum = 0;

        foreach ($price as $sumPrice) {
            $sum += $sumPrice->getProduct()->getPrice() * $sumPrice->getQuantity();
        }
        if ($sum <= 0) {
            $sum = 'Сумма должна быть больше 0';
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