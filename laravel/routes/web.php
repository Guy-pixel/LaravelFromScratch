<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    $files = File::files(resource_path("posts"));
    $documents = [];
    foreach($files as $file){
        $documents[] = new YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $documents->title,
            $documents->excerpt,
            $documents->date,
            $documents->body
        );
    }
    return view('posts', ['posts'=>$posts]);

    //ddd($document->title);


    // return view('posts', [
    //     'posts' => Post::all(),
    // ]);
});
Route::get('posts/{post}', function ($slug) {
    return view(
        'post',
        [
            'post' => Post::find($slug)
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
})->where('post', '[A-z_\-]+');
