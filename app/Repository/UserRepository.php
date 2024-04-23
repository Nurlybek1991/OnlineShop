<?php
namespace Repository;

use Entity\User;

class UserRepository extends Repository
{

    public function create(string $name, string $surname, int $phone, string $email, string $password): void
    {

        $stmt = self::getPdo()->prepare("INSERT INTO users (name, surname, phone, email, password) VALUES (:name, :surname, :phone, :email,  :password)");
        $stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'email' => $email, 'password' => $password]);

    }

    public function getByEmail(string $email): User| null
    {

        $stmt = self::getPdo()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if(empty($user)){
            return null;
        }

        return $this->hydrate($user);

    }

    public function getById($userId): User|null
    {
        $stmt = self::getPdo()->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id' => $userId]);
        $user = $stmt->fetch();

        if(empty($user)){
            return null;
        }

        return $this->hydrate($user);

    }

    public function hydrate(array $data): User
    {
        return new User($data['id'], $data['name'], $data['surname'], $data['phone'], $data['email'], $data['password']);
    }
}