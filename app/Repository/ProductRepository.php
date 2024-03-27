<?php
namespace Repository;

use Entity\Product;

class ProductRepository extends Repository
{
    public function getAll(): array|null
    {
        $stmt = self::getPdo()->query('SELECT * FROM products');
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

    public function getOneById(int $id): array
    {
        $statement = self::getPdo()->prepare("SELECT * FROM products WHERE id = :id");
        $statement->execute(['id' => $id]);
        return  $statement->fetch();

    }

    public function hydrate(array $data): Product
    {
        return new Product($data['id'],$data['product_name'],$data['price'],$data['image']);
    }


}