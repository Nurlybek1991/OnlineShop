<?php

namespace Repository;

class CommentRepository extends Repository
{
    public function add(int $userId, int $productId, string $comment): void
    {
        $stmt = self::getPdo()->prepare("INSERT INTO comment (user_id, product_id, comment) VALUES (:user_id, :product_id, :comment)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'comment' => $comment]);
    }


}