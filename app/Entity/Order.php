<?php

namespace Entity;


class Order
{
    private int $id;
    private int $userId;
    private string $firstname;
    private string $lastname;
    private string $country;
    private string $address;
    private string $city;
    private int $postcode;
    private int $phoneOrder;
    private string $email;

    public function __construct(int $id, int $userId, string $firstname, string $lastname, string $country, string $address, string $city, int $postcode, int $phoneOrder, string $email)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->country = $country;
        $this->address = $address;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->phoneOrder = $phoneOrder;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): int
    {
        return $this->userId;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostcode(): int
    {
        return $this->postcode;
    }

    public function getPhoneOrder(): int
    {
        return $this->phoneOrder;
    }

    public function getEmail(): string
    {
        return $this->email;
    }




}