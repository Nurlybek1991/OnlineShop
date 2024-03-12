<?php

namespace Controller;

use Model\User;

class UserController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function getRegistrate(): void
    {
        require_once './../View/registrate.php';
    }

    public function postRegistrate(): void
    {

        $errors = $this->validateRegistrate($_POST);


        if (empty($errors)) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $passwordRep = $_POST['c_password'];

            $this->userModel->create($name, $surname, $phone, $email, $password);

            $this->userModel->getByEmail($email);
            header('location:/login');
        }

        require_once './../View/registrate.php';

    }

    private function validateRegistrate(array $data): array
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

        if (isset($data['password'])) {
            $password = $data['password'];
            if (empty($password)) {
                $errors['password'] = 'Укажите пароль.';
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,30}$/', $password)) {
                $errors['password'] = 'Пароль должен состоять из букв (латиница) и цифр, иметь хотябы одну букву или цифру верхнего регистра';
            }
        } else {
            $errors['password'] = 'Укажите пароль.';
        }

        if (isset($data['c_password'])) {
            $password = $data['password'];
            $passwordRep = $data['c_password'];
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

    public function getLogin(): void
    {
        require_once './../View/login.php';
    }

    public function postLogin(): void
    {

        $errors = $this->validateLogin($_POST);


        if (empty($errors)) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = $this->userModel->getByEmail($login);

            if (empty($user)) {
                $errors['login'] = 'Логин введен неверно';
            } else {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header('location:/main');
                } else {
                    $errors['login'] = 'Логин или пароль введен неверно';
                }
            }
            if ($errors) {
                require_once './../View/login.php';
            }

        }
        require_once './../View/login.php';
    }

    private function validateLogin(array $data): array
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

}