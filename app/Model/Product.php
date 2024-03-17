<?php
namespace Model;

use Entity\ProductEntity;

class Product extends Model
{
    public function getAll(): array|null
    {
        $stmt = $this->pdo->query('SELECT * FROM products');
        $products = $stmt->fetchAll();

        if(empty($products)){
            return null;
        }

        $arr = [];
        foreach ($products as $product) {
            $arr[] = new ProductEntity($product['id'],$product['name'],$product['price'],$product['image']);
        }

        return $arr;

    }

}