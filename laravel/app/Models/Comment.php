<?php

namespace App\Models;
use App\Models\Post;

Class Comment Extends  Post {
    private $replies;
    private $dblocation;
    private function __construct(){
        $this->replies=$replies;
        $this->dblocation=$dblocation;

    }

    public static function getID($id){
        $query = "SELECT * FROM $$dblocation WHERE ID = $id";

    }
}