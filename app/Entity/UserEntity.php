<?php

namespace Entity;

class UserEntity
{

    private int $id;
    private string $name;
    private string $surname;

    private int $phone;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $surname, int $phone, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


}