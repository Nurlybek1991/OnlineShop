<?php

namespace Entity;

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private string $image;
    private string $info;


    public function __construct(int $id, string $name, float $price, string $image, string $info)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->info = $info;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getInfo(): string
    {
        return $this->info;
    }


}