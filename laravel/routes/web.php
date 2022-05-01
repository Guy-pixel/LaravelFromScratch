<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest('published_at')->get(),
        'categories' => Category::all()
    ]);
});
Route::get('posts/{post}', function (Post $post) {
    return view(
        'post',
        [
            'post' => $post
        ]
    );
});
Route::get('categories/{category}', function (Category $category) {
    return view(
        'posts',
        [
            'posts' => $category->posts
        ]
    );
});
Route::get('author/{author:username}', function (User $author) {
    return view(
        'posts',
        [
            'posts' => $author->posts
        ]
    );
});

