<?php
declare(strict_types=1);

class ProductLoader extends ConnectDatabase

{
    private array $products;

    public function __construct()

    {
        $con = ConnectDatabase::connect();
        $handle = $con->prepare('SELECT * FROM product');
        $handle->execute();
        $selectedProducts = $handle->fetchAll();

        foreach ($selectedProducts as $product) {
            $this->products[] = new Product((int)$product['id'], $product['name'], (int)$product['price']);
        }
    }

    public function getAllProducts(): array
    {
        return $this->products;
    }

    public function getProductById(int $id): Product
    {
        foreach ($this->getAllProducts() as $product) {
            if ($id === $product->getId()) {
                return $product;
            }
        }
    }

}
