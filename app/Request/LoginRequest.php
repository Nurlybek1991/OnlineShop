<?php

namespace Request;

use Repository\UserRepository;

class LoginRequest extends Request
{

    private UserRepository $userModel;
    public function __construct(string $method, array $body = [], array $headers = [])
    {
        parent::__construct($method, $headers, $body);

        $this->userModel = new UserRepository();

    }

    public function getLogin()
    {
        return $this->body['login'];

    }

    public function getPassword()
    {
        return $this->body['password'];

    }
    function validate(): array
    {
        $errors = [];

        if (isset($this->body['login'])) {
            $login = $this->body['login'];
            if (empty($login)) {
                $errors['login'] = 'Логин должен содержать более 4 символов';
            } elseif (!strpos($login, '@')) {
                $errors['login'] = "Некоректное заполнение поля Логин, нет символа @";
            }
        } else {
            $errors['login'] = 'Введите Логин';
        }

        if (isset($this->body['password'])) {
            $password = $this->body['password'];
            if (empty($password)) {
                $errors['password'] = 'Поле пустое';
            }
        } else {
            $errors['password'] = 'Неверный пароль';
        }

        return $errors;

    }

}