<?php

namespace Repository;

use Entity\Order;
use Entity\User;


class OrderRepository extends Repository
{

    public function create(int $userId, string $firstname, string $lastname, int $phoneOrder, string $email, int $postcode, string $city, string $address, string $country): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO orders (user_id ,firstname, lastname, phoneOrder, email, postcode, city, address, country) VALUES (:user_id, :firstname, :lastname, :phoneOrder, :email,  :postcode, :city, :address, :country)");
        $stmt->execute(['user_id' => $userId, 'firstname' => $firstname, 'lastname' => $lastname, 'phoneOrder' => $phoneOrder, 'email' => $email, 'postcode' => $postcode, 'city' => $city, 'address' => $address, 'country' => $country]);

    }

    public function getAll(string $userId): array|null
    {

        $stmt = $this->pdo->prepare("SELECT firstname,lastname FROM orders 
         JOIN users ON users.id =orders.user_id
         WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $userId]);
        $orderProducts =  $stmt->fetch();

        if (!$orderProducts){
            return null;
        }

        $arr = [];
        foreach ($orderProducts as $orderProduct){
            $arr[] = $this->hydrate((array) $orderProduct);
        }
        return $arr;
    }
    public function hydrate(array $data): Order
    {
        return new Order($data['id'],
           new User($data['id'], $data['name'], $data['surname'], $data['phone'], $data['email'],
               $data['password']),$data['firstname'],$data['lastname'],$data['country'],$data['address'],
            $data['city'],$data['postcode'],$data['phone'],$data['email']);
    }

    public function getByEmail(string $email): mixed
    {

        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function getOrderId(): false|string
    {
        return $this->pdo->lastInsertId();
    }


}