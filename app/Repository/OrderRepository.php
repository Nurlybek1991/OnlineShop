<?php

namespace Repository;

use Entity\Order;


class OrderRepository extends Repository
{

    public function create(int $userId, string $firstname, string $lastname, string $country, string $address, string $city, int $postcode, int $phoneOrder, string $email): void
    {

        $stmt = self::getPdo()->prepare("INSERT INTO orders (user_id ,firstname, lastname,country, address,  city, postcode,  phoneOrder, email) VALUES (:user_id, :firstname, :lastname,  :country, :address, :city,  :postcode, :phoneOrder, :email)");
        $stmt->execute(['user_id' => $userId, 'firstname' => $firstname, 'lastname' => $lastname, 'country' => $country, 'address' => $address, 'city' => $city, 'postcode' => $postcode, 'phoneOrder' => $phoneOrder, 'email' => $email]);

    }

    public function getByEmail(string $email): array|null
    {

        $stmt = self::getPdo()->prepare("SELECT * FROM orders WHERE email=:email");
        $stmt->execute(['email' => $email]);
        $orders =  $stmt->fetch();

        if(empty(!$orders)){
            return null;
        }
        $arr = [];
        foreach ($orders as $order) {
            $arr[] = $this->hydrate($order);

        }

        return $arr;

    }

    public function getById(string $orderId): Order|null
    {

        $stmt = self::getPdo()->prepare("SELECT * FROM orders WHERE id=:id");
        $stmt->execute(['id' => $orderId]);
        $order = $stmt->fetch();

        if (empty($order)) {
            return null;
        }

        return $this->hydrate($order);


    }

    public function getOrderId(): false|string
    {
        return self::getPdo()->lastInsertId();
    }

    private function hydrate(array $data): Order
    {
        return new Order($data['id'], $data['user_id'], $data['firstname'], $data['lastname'], $data['country'], $data['address'], $data['city'], $data['postcode'], $data['phoneOrder'], $data['email']);
    }


}
