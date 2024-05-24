<?php

namespace Request;

class CommentRequest extends Request
{

    public function getUserId()
    {
        return $this->body['user_id'];
    }
    public function getProductId()
    {
        return $this->body['product_id'];
    }

    public function addMassage()
    {
        return $this->body['comment'];
    }

}