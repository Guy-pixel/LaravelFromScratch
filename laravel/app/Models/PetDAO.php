<?php

use App\Models\User;

class Pet extends User
{
    protected $fillable = [
        'Species',
        'Breed',
        'Neutered',
    ];
    public static function getByID($id){
        $sql = "SELECT * FROM Pets WHERE ID =" . $id . "";
    }
    
}
