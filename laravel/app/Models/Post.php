<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = [
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
    /**
     * If in the URI filters there is a 'search' tag search in fields title, body and excerpt for this parameter.
     * @param  $query
     * @param array $filters
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
                ->orWhere('excerpt', 'like', '%' . request('search') . '%');
        });
        /*
        we want to create the following sql:
        SELECT * FROM posts WHERE EXISTS(
            SELECT * FROM categories
                WHERE categories.id = posts.categories_id
                AND categories.slug = 'consequatur-qui-autem-laudantium-est-eveniet
            )
        */
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query
                ->whereExists(fn($query)=>
                    $query
                        ->where('category_id', 'posts.category_id')
                        ->where('categories.slug', $category)
                );
        });

            // Post::newQuery()->filter
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    { // because the relationship is called author, laravel assumes the id will be called 'author_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}
