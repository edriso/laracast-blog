<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts/posts');
});

Route::get('/posts/{postId}', function ($fileName) {
    $path = __DIR__ . "/../resources/posts/$fileName.html";

    if (!file_exists($path)) {
        abort(404);
    }

    $post = file_get_contents($path);

    return view('posts/post', [
        'post' => $post
    ]);
})->whereAlphaNumeric('postId');
// })->where('postId', '[0-9A-z_\-]+');