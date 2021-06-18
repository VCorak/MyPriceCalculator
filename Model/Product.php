<?php
declare(strict_types=1);

class Product // inmutable

{
    protected int $id;
    protected string $name;
    protected float $price;


    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;

    }

    public function getId():int
    {

        return $this->id;
    }

    public function getName():string
    {

        return $this->name;
    }

    public function getPrice():float
    {

        return $this->price;
    }

}
