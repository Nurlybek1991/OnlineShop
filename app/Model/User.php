<?php
require_once './../Model/Model.php';
class User extends Model
{

    //Добавление пользователей
    public function addUser(string $name, string $surname, int $phone, string $email, string $password): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO users (name, surname, phone, email, password) VALUES (:name, :surname, :phone, :email,  :password)");
        $stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'email' => $email, 'password' => $password]);

    }

//    Вывод пользователей по почте
    public function getByEmail(string $email)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

// Вывод пользователей по логину
    public function getByLogin(string $login)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $login]);
        return $stmt->fetch();
    }

}