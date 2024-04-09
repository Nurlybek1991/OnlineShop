<?php

namespace Request;

use Repository\UserProductRepository;

class AddProductRequest extends Request
{
    private UserProductRepository $userProductRepository;

    public function __construct(string $method, array $headers=[], array $body=[])
    {
        parent::__construct($method,  $headers, $body);

        $this->userProductRepository = new UserProductRepository();
    }

    public function getProductId()
    {
        return $this->body['product_id'];
    }
    public function getQuantity()
    {
        return $this->body['quantity'];
    }
    public function validate($userId): array
    {
        $errors = [];

        $productId = $this->getProductId();
        $product = $this->userProductRepository->getByUserIdProductId($userId,$productId);

        if ($this->getQuantity() <= '0') {

            $errors['quantity'] = 'Продукта нет такого';

        }

        return $errors;
    }

}