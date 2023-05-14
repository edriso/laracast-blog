<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isEmpty;

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
    if (!file_exists($path = __DIR__ . "/../resources/posts/$fileName.html")) {
        abort(404);
    }

    $post = cache()->remember("posts.{$path}", now()->addMinutes(30), fn () => file_get_contents($path));

    return view('posts/post', [
        'post' => $post
    ]);
})->where('postId', '[0-9A-z_\-]+');
// })->whereAlphaNumeric('postId');