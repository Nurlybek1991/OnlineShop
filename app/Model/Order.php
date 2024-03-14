<?php

namespace Model;

class Order extends Model
{

    public function create(string $firstname, string $lastname, int $phoneOrder, string $email, int $postcode, string $city, string $address, string $country): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO orders (firstname, lastname, phoneOrder, email, postcode, city, address, country) VALUES (:firstname, :lastname, :phoneOrder, :email,  :postcode, :city, :address, :country)");
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'phoneOrder' => $phoneOrder, 'email' => $email, 'postcode' => $postcode, 'city' => $city, 'address' => $address, 'country' => $country]);

    }

    public function getByEmail(string $email): mixed
    {

        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}