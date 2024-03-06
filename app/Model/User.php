<?php
class User extends Model
{

    public function create(string $name, string $surname, int $phone, string $email, string $password): void
    {

        $stmt = $this->pdo->prepare("INSERT INTO users (name, surname, phone, email, password) VALUES (:name, :surname, :phone, :email,  :password)");
        $stmt->execute(['name' => $name, 'surname' => $surname, 'phone' => $phone, 'email' => $email, 'password' => $password]);

    }

    public function getByEmail(string $email)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }


    public function checkInSession(): void
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
    }

}