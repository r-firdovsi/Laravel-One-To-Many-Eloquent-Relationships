<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My Second Post', 'body'=>'I Love Laravel']);
    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->posts as $post) {
        echo $post->title . "<br />";
    }
//    return $user->posts;
});

Route::get('/update', function () {
    $user = User::find(1);
    $user->posts()->where('id', '=', 4)->update(['title'=>'I Love Laravel Very Musch', 'body'=>'This is awesome thank you
    Edwin']);
});

Route::get('/delete', function () {
    $user = User::find(1);
    $user->posts()->whereId(1)->delete();
//    $user->posts()->delete();  //Delete all
});
