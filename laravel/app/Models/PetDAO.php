<?php

use App\Models\User;


class Product
{
    public $name;
    public $description;
    public $price;

    function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    public function outputFillable()
    {
        $fillable = [];
        foreach ($this->fillable as $key => $value) {
            $fillable+=[$key, $value];
        }
    }
}
$product1 = new Product("iPhone 12", "The 12th Version of the iPhone", 999.99);

$product1.outputFillable();
