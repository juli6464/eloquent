<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


// Route::get('eloquent', function () {
//     $posts = Post::all();

//     foreach ($posts as $post) {
//         echo "<p>ID: $post->id, TITLE: $post->title</p> <br>";
//     }
// });

Route::get('eloquent', function () {
    $posts = Post::where('id', '>=', '20')
        ->get();

    foreach ($posts as $post) {
        echo "<p>ID: $post->id, TITLE: $post->title</p> <br>";
    }
});

// // Si queremos ordenar de forma descendente y solo ver 3 items
// Route::get('eloquent', function () {
//     $posts = Post::where('id', '>=', '20')
//         ->orderBy('id', 'desc')
//         ->take(3)
//         ->get();

//     foreach ($posts as $post) {
//         echo "<p>ID: $post->id, TITLE: $post->title</p> <br>";
//     }
// });

Route::get('posts', function () {
    $posts = Post::get();

    foreach ($posts as $post) {
        echo "$post->id
        <strong>{$post->user->get_name} </strong>
        $post->get_title <br>";
    }
});

Route::get('users', function () {
    $users = User::get();

    foreach ($users as $user) {
        echo "$user->id
        <strong>{$user->get_name} </strong>
        {$user->posts->count()} posts <br>";
    }
});

Route::get('collections', function () {
    $users = User::get();

    dd($users);
    //dd($users->contains('4'));
    //dd($users->except([1,2,3]));
    //dd($users->only(4));
    //dd($users->find(4)); //Busca solamente el id 4
    //dd($users->load('posts'));//Cargar la relación con post definida en el modelo
});

Route::get('serialization', function () {
    $users = User::get();

    // dd($users->toArray());
       $user = $users->find(1);
    //    dd($user);
       dd($user->toJson());

});
