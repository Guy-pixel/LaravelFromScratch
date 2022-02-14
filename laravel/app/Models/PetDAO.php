<?php

use App\Models\User;

class Pet extends User
{
    protected $fillable = [
        'Species',
        'Breed',
        'Neutered',
    ];
    public static function outputFillable($fillable)
    {

        $output=[];
        foreach($fillable as $variableName){
            array_push($output, $variableName);

        }
        return $output;
        
    }
    public static function getByID($id)
    {
        $sql = "SELECT * FROM Pets WHERE ID =" . $id . "";
    }
}


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
}
$product1 = new Product("iPhone 12", "The 12th Version of the iPhone", 999.99);
