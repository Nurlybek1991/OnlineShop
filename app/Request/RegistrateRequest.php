<?php

namespace Request;

use Repository\UserRepository;

class RegistrateRequest extends Request
{
    private UserRepository $userModel;

    public function __construct(string $method, array $body = [], array $headers = [])
    {
        parent::__construct($method, $body, $headers);

        $this->userModel = new UserRepository();
    }

    public function getName()
    {
        return $this->getBody()['name'];
    }

    public function getSurname()
    {
        return $this->getBody()['surname'];
    }

    public function getPhone()
    {
        return $this->getBody()['phone'];
    }

    public function getEmail()
    {
        return $this->getBody()['email'];
    }

    public function getPassword()
    {
        return $this->getBody()['password'];
    }


    function validate(): array
    {

        $errors = [];

        if (isset($this->body['name'])) {
            $name = $this->getName();
            if (empty($name)) {
                $errors['name'] = 'Укажите имя.';
            } elseif (strlen($name) < 2) {
                $errors['name'] = 'Имя должно содержать более 2 символов.';
            }
        } else {
            $errors['name'] = 'Укажите имя.';
        }

        if (isset($this->body['surname'])) {
            $surname = $this->getSurname();
            if (empty($surname)) {
                $errors['surname'] = 'Укажите фамилию.';
            } elseif (strlen($surname) < 2) {
                $errors['surname'] = 'Фамилия должна содержать более 2 символов.';
            }
        } else {
            $errors['surname'] = 'Укажите фамилию.';
        }

        if (isset($this->body['phone'])) {
            $phone = $this->getPhone();
            if (empty($phone)) {
                $errors['phone'] = 'Введите Номер Телефона.';
            } elseif (strlen($phone) < 6) {
                $errors['phone'] = 'Номер Телефона должен содержать более 6 символов.';
            }
        } else {
            $errors['phone'] = 'Введите Номер Телефона.';
        }

        if (isset($this->body['email'])) {
            $email = $this->getEmail();
            if (empty($email)) {
                $errors['email'] = 'Укажите почту.';
            } elseif (strlen($email) < 5) {
                $errors['email'] = 'Имя почты должно быть длиной от 5 символов.';
            } elseif (!strpos($email, '@')) {
                $errors['email'] = 'Введено некорректное имя почты, нет символа @.';
            } elseif (true) {
                $user = $this->userModel->getByEmail($email);
                if ($user) {
                    $errors['email'] = "Такая почта уже существует!";
                }
            }
        } else {
            $errors['email'] = 'Укажите почту.';
        }

        if (isset($this->body['password'])) {
            $password = $this->getPassword();
            if (empty($password)) {
                $errors['password'] = 'Укажите пароль.';
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,30}$/', $password)) {
                $errors['password'] = 'Пароль должен состоять из букв (латиница) и цифр, иметь хотябы одну букву или цифру верхнего регистра';
            }
        } else {
            $errors['password'] = 'Укажите пароль.';
        }

        if (isset($this->body['c_password'])) {
            $password = $this->body['password'];
            $passwordRep = $this->body['c_password'];
            if (empty($passwordRep)) {
                $errors['c_password'] = 'Укажите  в поле пароль.';
            } elseif ($password !== $passwordRep) {
                $errors['password'] = 'Пароли не совпадают. Повторите попытку.';
            }
        } else {
            $errors['c_password'] = 'Укажите  в поле пароль.';
        }

        return $errors;
    }
}