<?php

namespace Model;

class Order extends Model
{

    public function create(int $userId, string $firstname, string $lastname, int $phoneOrder, string $email, int $postcode, string $city, string $address, string $country): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO orders (user_id ,firstname, lastname, phoneOrder, email, postcode, city, address, country) VALUES (:user_id, :firstname, :lastname, :phoneOrder, :email,  :postcode, :city, :address, :country)");
        $stmt->execute(['user_id' => $userId, 'firstname' => $firstname, 'lastname' => $lastname, 'phoneOrder' => $phoneOrder, 'email' => $email, 'postcode' => $postcode, 'city' => $city, 'address' => $address, 'country' => $country]);

    }

    public function getByUserId(string $userId): mixed
    {

        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch();
    }

    public function getByEmail(string $email): mixed
    {

        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function getOrderId(): string
    {
        return $this->pdo->lastInsertId();
    }

}