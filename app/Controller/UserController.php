<?php

namespace Controller;

use Repository\UserRepository;
use Request\LoginRequest;
use Request\RegistrateRequest;

class UserController
{
    private UserRepository $userModel;

    public function __construct()
    {
        $this->userModel = new UserRepository;
    }

    public function getRegistrate(): void
    {
        require_once './../View/registrate.php';
    }

    public function postRegistrate(RegistrateRequest $request): void
    {
        $errors = $request->validate();

        if (empty($errors)) {
            $data = $request->getBody();
            $name = $data ['name'];
            $surname = $data['surname'];
            $phone = $data['phone'];
            $email = $data['email'];
            $password = $data['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $passwordRep = $data['c_password'];

            $this->userModel->create($name, $surname, $phone, $email, $password);

            header('location:/login');

        }

        require_once './../View/registrate.php';

    }

    public function getLogin(): void
    {
        require_once './../View/login.php';
    }

    public function postLogin(LoginRequest $request): void
    {
        $errors = $request->validate();

        if (empty($errors)) {
            $data = $request->getBody();
            $login = $data['login'];
            $password = $data['password'];

            $user = $this->userModel->getByEmail($login);

            if (empty($user)) {
                $errors['login'] = 'Логин введен неверно';
            } else {
                if (password_verify($password, $user->getPassword())) {
                    session_start();
                    $_SESSION['user_id'] = $user->getId();
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

}