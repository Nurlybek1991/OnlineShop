<?php

namespace Request;

use Repository\UserProductRepository;

class AddProductRequest extends Request
{
    private UserProductRepository $userProductRepository;

    public function __construct(string $method, string $uri, array $headers, array $body)
    {
        parent::__construct($method, $uri, $headers, $body);

        $this->userProductRepository = new UserProductRepository();
    }

    public function getProductId()
    {
        return $this->body['product_id'];
    }

    public function validate($userId): array
    {
        $errors = [];

        $product = $this->userProductRepository->getByUserIdProductId($userId, $this->getProductId());

        if ($product->getQuantity() <= '0') {

            $errors['quantity'] = 'Продукта нет ';
        }

        return $errors;
    }

}