<?php
namespace Repository;

use Entity\Product;

class ProductRepository extends Repository
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
            $arr[] = $this->hydrate($product);
        }

        return $arr;

    }

    public function hydrate(array $data): Product
    {
        return new Product($data['id'],$data['name'],$data['price'],$data['image']);
    }


}