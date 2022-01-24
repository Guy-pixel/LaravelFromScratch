<?php

use App\Models\User;

class Pet extends User
{
    protected $fillable = [
        'Species',
        'Breed',
        'Neutered',
    ];
}
