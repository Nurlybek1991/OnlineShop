<?php

namespace Request;

use Repository\SelectedRepository;

class SelectedRequest extends Request
{
//    private SelectedRepository $selectedModel;
//
//    public function __construct(string $method, array $headers=[], array $body=[])
//    {
//        parent::__construct($method,  $headers, $body);
//
//        $this->selectedModel = new SelectedRepository();
//    }
    public function getProductId()
    {
        return $this->body['product_id'];
    }


}