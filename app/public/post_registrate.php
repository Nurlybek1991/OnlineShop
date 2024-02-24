<?php

function validate(array $data)
{
    $errors = [];

    if (isset($data['name'])) {
        $name = $data['name'];
        if (empty($name)) {
            $errors['name'] = 'Введите Имя';
        } elseif (strlen($name) < 2) {
            $errors['name'] = 'Имя должно содержать более 2 символов';
        }
    } else {
        $errors['name'] = 'Введите Имя';
    }

    if (isset($data['surname'])) {
        $surname = $data['surname'];
        if (empty($surname)) {
            $errors['surname'] = 'Введите Фамилию';
        } elseif (strlen($surname) < 2) {
            $errors['surname'] = 'Фамилия должна содержать более 2 символов';
        }
    } else {
        $errors['surname'] = 'Введите Фамилию';
    }

    if (isset($data['phone'])) {
        $phone = $data['phone'];
        if (empty($phone)) {
            $errors['phone'] = 'Введите Номер Телефона';
        } elseif (strlen($phone) < 6) {
            $errors['phone'] = 'Номер Телефона должен содержать более 6 символов';
        }
    } else {
        $errors['phone'] = 'Введите Номер Телефона';
    }

    if (isset($data['email'])) {
        $email = $data['email'];
        if (empty($email)) {
            $errors['email'] = 'Введите почта';
        } elseif (strlen($email) < 4) {
            $errors['email'] = 'Электронная почта должна содержать более 4 символов';
        } elseif (!strpos($email, '@')) {
            $errors['email'] = 'Некорректная почта';
        }
    } else {
        $errors['email'] = 'Введите почта';
    }

    if (isset($data['password'])) {
        $password = $data['password'];
        if (empty($password)) {
            $errors['password'] = 'Введите в поле Пароль';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Пароль должен содержать 6 символов';
        }
    } else {
        $errors['password'] = 'Введите в поле Пароль';
    }

    if (isset($data['c_password'])) {
        $passwordRep = $data['c_password'];
        if (empty($passwordRep)) {
            $errors['c_password'] = 'Повторите Пароль';
        } elseif ($passwordRep !== $password) {
            $errors['c_password'] = 'Пароли не совподают';
        }
    } else {
        $errors['c_password'] = 'Повторите Пароль';
    }

    return $errors;
}

$errors = validate($_POST);


if (empty($errors)) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRep = $_POST['c_password'];


    $pdo = new PDO("pgsql:host=db;dbname=postgres", "dbuser", "dbpwd");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, surname, phone, email, password) VALUES (:name, :surname, :phone, :email,  :password)");
    $stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'email' => $email, 'password' => $password]);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);

    $data = $stmt->fetch();

    print_r($data);
}

require_once './registrate.php';

