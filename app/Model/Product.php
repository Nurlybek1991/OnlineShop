<?php

class Product extends Model
{
    public function getById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    public function getAll(): null|array
    {

        $stmt = $this->pdo->query('SELECT * FROM products');
        return $stmt->fetchAll();

    }

}