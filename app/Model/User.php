<?php
require_once './../Model/Model.php';

class User
{
    //Добавление пользователей
    public function addUsers($name, $surname, $phone, $email, $password): void
    {
        $pdo = new Model();
        $stmt = $pdo->getPDO()->prepare("INSERT INTO users (name, surname, phone, email, password) VALUES (:name, :surname, :phone, :email,  :password)");
        $stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'email' => $email, 'password' => $password]);

    }

//    Вывод пользователей по почте
    public function getEmail($email)
    {
        $pdo = new Model();
        $stmt = $pdo->getPDO()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

// Вывод пользователей по логину
    public function getLogin($login)
    {
        $pdo = new Model();
        $stmt = $pdo->getPDO()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $login]);
        return $stmt->fetch();
    }
}