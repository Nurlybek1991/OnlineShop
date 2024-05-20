<?php

namespace Entity;

class Comment
{
    private int $id;

    private User $user;
    private Product $product;

    private string $comment;


    public function __construct(int $id, User $user, Product $product, string $comment)
    {
        $this->id = $id;
        $this->user = $user;
        $this->product = $product;
        $this->comment = $comment;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getComment(): string
    {
        return $this->comment;
    }


}