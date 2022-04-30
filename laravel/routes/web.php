<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;

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
    $posts = Post::all();
    // // Array mapping to mapping everything being passed to $file from $files to $posts
    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     // return a post which pulls from the document all info
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);
    return view('posts', ['posts' => $posts]);


    // return view('posts', [
    //     'posts' => Post::all(),
    // ]);
});
Route::get('posts/{post}', function ($id) {
    return view(
        'post',
        [
            'post' => Post::findOrFail($id)
        ]
    );

    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // if(! file_exists($path)){
    //     return redirect('/');
    //     dd("404");
    // }
    // $post = cache()->remember("posts.{$slug}", now()->addSecond(5), function() use ($path) {
    //     var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });


    // return view('post', [
    //     'post' => $post
    // ]);
});
