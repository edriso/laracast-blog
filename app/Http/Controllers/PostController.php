<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search')); // returns string
        // "sit adipisci" // app\Http\Controllers\PostController.php:13

        // dd(request(['search'])); // returns array
        // array:1 [▼ // app\Http\Controllers\PostController.php:14
        //     "search" => "sit adipisci"
        // ]

        // dd(request()->only('search')); // returns array


        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}