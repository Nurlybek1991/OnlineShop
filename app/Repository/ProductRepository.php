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
        $stmt = self::getPdo()->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return  $stmt->fetch();

    }

    public function getById(int $id): Product|null
    {
        $stmt = self::getPdo()->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $product =   $stmt->fetch();

        if(empty($product)) {
            return null;
        }

        return $this->hydrate($product);

    }

    public function hydrate(array $data): Product
    {
        return new Product($data['id'],$data['name'],$data['price'],$data['image'], $data['info']);
    }


}