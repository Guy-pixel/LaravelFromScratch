<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');
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

