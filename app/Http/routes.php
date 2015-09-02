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

Route::get('/', function () {
    return view('welcome');
});

Route::get('edit-post/{id}', function ($id) {

    Auth::loginUsingId(2);

    $post = App\Post::findOrFail($id);

    if (Gate::denies('update-post', $post)) {
        return redirect('/');
    }

    return $post->title;

});
