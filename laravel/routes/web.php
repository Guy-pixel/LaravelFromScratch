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
    $posts=Post::latest();
    if(request('search')){
        $posts->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%')->orWhere('excerpt', 'like', '%' . request('search') . '%');
    }
    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()
    ]);
})->name('home');
Route::get('posts/{post}', function (Post $post) {
    return view(
        'post',
        [
            'post' => $post
        ]
    );
})->name('post');
Route::get('categories/{category}', function (Category $category) {
    return view(
        'posts',
        [
            'posts' => $category->posts,
            'currentCategory'=> $category,
            'categories' => Category::all()
        ]
    );
})->name('category');
Route::get('author/{author:username}', function (User $author) {
    return view(
        'posts',
        [
            'posts' => $author->posts,
            'categories' => Category::all()
        ]
    );
})->name('author');

