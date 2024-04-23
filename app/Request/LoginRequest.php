<?php

namespace Request;

class LoginRequest extends Request
{

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
            $login = $this->getLogin();
            if (empty($login)) {
                $errors['login'] = 'Логин должен содержать более 4 символов';
            } elseif (!strpos($login, '@')) {
                $errors['login'] = "Некоректное заполнение поля Логин, нет символа @";
            }
        } else {
            $errors['login'] = 'Введите Логин';
        }

        if (isset($this->body['password'])) {
            $password = $this->getPassword();
            if (empty($password)) {
                $errors['password'] = 'Поле пустое';
            }
        } else {
            $errors['password'] = 'Неверный пароль';
        }

        return $errors;

    }

}