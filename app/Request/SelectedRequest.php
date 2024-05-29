<?php

namespace Request;

use Repository\SelectedRepository;

class SelectedRequest extends Request
{
    private SelectedRepository $selectedModel;

    public function __construct(string $method, array $headers=[], array $body=[])
    {
        parent::__construct($method,  $headers, $body);

        $this->selectedModel = new SelectedRepository();
    }

    public function getProductId()
    {
        return $this->body['product_id'];
    }

    public function deleteValidate(int $userId): array
    {
        $errors = [];

        $product = $this->selectedModel->check($userId, $this->getProductId());
        if (!$product) {
            $errors['removeProduct'] = "Товар не найден в избранных";
        }

        return $errors;
    }

    public function addValidate(int $userId): array
    {
        $errors = [];

        $product = $this->selectedModel->check($userId, $this->getProductId());
        if ($product) {
            $errors['main'] = "Товар уже добавлен";
        }

        return $errors;
    }
}