<?php

//print_r($_POST);die;

function validate(array $data): array
{
    $errors = [];


    if (isset($data['login'])) {
        $login = $data['login'];
        if (empty($login)) {
            $errors['login'] = 'Логин должен содержать более 4 символов';
        } elseif (!strpos($login, '@')) {
            $errors['login'] = "Некоректное заполнение поля Логин, нет символа @";
        }
    } else {
        $errors['login'] = 'Введите Логин';
    }

    if (isset($data['password'])) {
        $password = $data['password'];
        if (empty($password)) {
            $errors['password'] = 'Поле пустое';
        }
    } else {
        $errors['password'] = 'Неверный пароль';
    }

    return $errors;
}

$errors = validate($_POST);


if (empty($errors)) {
    $login = $_POST['login'];
    $password = $_POST['password'];


    $pdo = new PDO("pgsql:host=db;dbname=postgres", "dbuser", "dbpwd");


    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email' => $login]);

    $data = $stmt->fetch();
    if (empty($data)) {
        $errors['login'] = 'Логин введен неверно';
    } else {
        if (password_verify($password, $data['password'])) {
            echo 'Логин успешно введен';
        } else {
            $errors['login'] = 'Логин или пароль введен неверно';
        }


    }
}
require_once './login.php';