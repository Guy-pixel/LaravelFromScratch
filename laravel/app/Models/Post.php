<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with=[
        'category',
        'author'
    ];
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'category_id',
        'user_id'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
    public function author(){ // because the relationship is called author, laravel assumes the id will be called 'author_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}
