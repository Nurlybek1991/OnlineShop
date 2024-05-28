<?php

namespace Repository;

use Entity\Comment;
use Entity\Product;
use Entity\User;

class CommentRepository extends Repository
{
    public function add(int $userId, int $productId, string $comment): void
    {
        $stmt = self::getPdo()->prepare("INSERT INTO comment (user_id, product_id, comment) VALUES (:user_id, :product_id, :comment)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'comment' => $comment]);
    }

    public function getOnlyComment(int $userId, int $productId): array
    {
        $stmt = self::getPdo()->prepare("SELECT c.id AS id, u.id AS user_id, u.name, u.surname,
                 u.phone, u.email, u.password, p.id AS product_id,
                 p.name, p.price, p.image, p.info, c.comment
                   FROM comment c
                 JOIN users u ON c.user_id = u.id
                 JOIN products p ON c.product_id = p.id
                 WHERE user_id = :user_id
                AND product_id = :product_id"
        );
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);

        $products = $stmt->fetchAll();
        $arr = [];
        foreach ($products as $product) {
            $arr[] = $this->hydrate($product);
        }
        return $arr;
    }

    public function hydrate(array $data): Comment
    {
        return new Comment($data['id'],
            new User($data['user_id'], $data['name'], $data['surname'], $data['phone'], $data['email'], $data['password']),
            new Product($data['product_id'], $data['name'], $data['price'], $data['image'], $data['info']),
            $data['comment']);

    }

}