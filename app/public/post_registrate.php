<?php

function validate(array $data): array
{
    $errors = [];

    if (isset($data['name'])) {
        $name = $data['name'];
        if (empty($name)) {
            $errors['name'] = 'Укажите имя.';
        } elseif (strlen($name) < 2) {
            $errors['name'] = 'Имя должно содержать более 2 символов.';
        }
    } else {
        $errors['name'] = 'Укажите имя.';
    }

    if (isset($data['surname'])) {
        $surname = $data['surname'];
        if (empty($surname)) {
            $errors['surname'] = 'Укажите фамилию.';
        } elseif (strlen($surname) < 2) {
            $errors['surname'] = 'Фамилия должна содержать более 2 символов.';
        }
    } else {
        $errors['surname'] = 'Укажите фамилию.';
    }

    if (isset($data['phone'])) {
        $phone = $data['phone'];
        if (empty($phone)) {
            $errors['phone'] = 'Введите Номер Телефона.';
        } elseif (strlen($phone) < 6) {
            $errors['phone'] = 'Номер Телефона должен содержать более 6 символов.';
        }
    } else {
        $errors['phone'] = 'Введите Номер Телефона.';
    }

    if (isset($data['email'])) {
        $email = $data['email'];
        if (empty($email)) {
            $errors['email'] = 'Укажите почту.';
        } elseif (strlen($email) < 5)  {
            $errors['email'] = 'Имя почты должно быть длиной от 5 символов.';
        } elseif (!strpos($email, '@')) {
            $errors['email'] = 'Введено некорректное имя почты, нет символа @.';
        }
    } else {
        $errors['email'] = 'Укажите почту.';
    }

    if (isset($data['password'])) {
        $password = $data['password'];
        if (empty($password)) {
            $errors['password'] = 'Укажите пароль.';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Используйте не менее 8 символов.';
        }
    } else {
        $errors['password'] = 'Укажите пароль.';
    }

    if (isset($data['c_password'])) {
        $passwordRep = $data['c_password'];
        if (empty($passwordRep)) {
            $errors['c_password'] = 'Укажите  в поле пароль.';
        } elseif ($passwordRep !== $password) {
            $errors['password'] = 'Пароли не совпадают. Повторите попытку.';
        }
    } else {
        $errors['c_password'] = 'Укажите  в поле пароль.';
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

