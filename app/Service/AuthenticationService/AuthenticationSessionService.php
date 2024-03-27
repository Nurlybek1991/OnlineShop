<?php

namespace Service\AuthenticationService;

use Entity\User;
use Repository\UserRepository;

class AuthenticationSessionService implements AuthenticationServiceInterface
{
    private UserRepository $userModel;

    public function __construct()
    {
        $this->userModel = new UserRepository();
    }

    public function check(): bool
    {
        if (empty($_SESSION['user_id'])) {
            session_start();
        }

        return isset($_SESSION['user_id']);
    }

    public function getCurrentUser(): User|null
    {
        if ($this->check()) {
            $userId = $_SESSION['user_id'];

            return $this->userModel->getById($userId);
        }

        return null;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->getByEmail($email);

        if (!$user instanceof User) {
            return false;
        }

        if (!password_verify($password, $user->getPassword())) {
            return false;
        }

        session_start();
        $_SESSION['user_id'] = $user->getId();

        return true;

    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

}