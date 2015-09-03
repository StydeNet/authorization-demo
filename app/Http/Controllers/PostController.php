<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Styde\Html\Facades\Alert;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate();

        return view('posts/list', compact('posts'));
    }

    public function edit($id)
    {
        Auth::loginUsingId(1);

        $post = Post::findOrFail($id);

        if (Gate::denies('update-post', $post)) {
            Alert::danger('No tienes permisos para editar este post');
            return redirect('posts');
        }

        return $post->title;
    }

}
