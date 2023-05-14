<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public static function getAll()
    {
        $files = File::files(resource_path("posts/"));
        return array_map(fn ($file) => $file->getContents(), $files);
        // return array_map(fn ($file) => file_get_contents($file), $files);
    }

    public static function find($slug)
    {
        // if (!file_exists($path = __DIR__ . "/../resources/posts/$slug.html")) {
        if (!file_exists($path = resource_path("posts/$slug.html"))) {
            // return redirect('/'); // models not responsible for this, controller is
            // abort(404);
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$path}", now()->addMinutes(30), fn () => file_get_contents($path));
    }
}
