<?php

namespace Request;

class CommentRequest extends Request
{

    public function getProductId()
    {
        return $this->body['product_id'];
    }

    public function addComment()
    {
        return $this->body['comment'];
    }

}