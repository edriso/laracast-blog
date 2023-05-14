<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    public static function find($slug)
    {
        // if (!file_exists($path = __DIR__ . "/../resources/posts/$slug.html")) {
        if (!file_exists($path = resource_path("/posts/$slug.html"))) {
            // return redirect('/'); // models not responsible for this, controller is
            // abort(404);
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$path}", now()->addMinutes(30), fn () => file_get_contents($path));
    }
}
