<?php

namespace Controller;

use Repository\UserRepository;
use Request\LoginRequest;
use Request\RegistrateRequest;
use Service\AuthenticationService\AuthenticationServiceInterface;

class UserController
{
    private UserRepository $userModel;
    private AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->userModel = new UserRepository();
        $this->authenticationService = $authenticationService;
    }

    public function getRegistrate(): void
    {
        require_once './../View/registrate.php';
    }

    public function postRegistrate(RegistrateRequest $request): void
    {
        $errors = $request->validate();

        if (empty($errors)) {
            $password = $request->getPassword();
            $name = $request->getName();
            $surname = $request->getSurname();
            $phone = $request->getPhone();
            $email = $request->getEmail();

            $password = password_hash($password, PASSWORD_DEFAULT);


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
            $login = $request->getLogin();
            $password = $request->getPassword();

            if ($this->authenticationService->login($login, $password)) {
                header("Location: /main");
            } else {
                $errors['login'] = 'Логин или пароль введен неверно';
            }

        }

        require_once './../View/login.php';

    }

}