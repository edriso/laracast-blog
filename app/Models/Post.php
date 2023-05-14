<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function getAll()
    {
        // $files = File::files(resource_path("posts/"));
        // return array_map(fn ($file) => $file->getContents(), $files);
        // return array_map(fn ($file) => file_get_contents($file), $files);
        $files = File::files(resource_path("posts"));
        return collect($files)
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
            ));
    }

    public static function find($slug)
    {
        // if (!file_exists($path = __DIR__ . "/../resources/posts/$slug.html")) {
        // if (!file_exists($path = resource_path("posts/$slug.html"))) {
        // return redirect('/'); // models not responsible for this, controller is
        // abort(404);
        // throw new ModelNotFoundException();
        // }
        // return cache()->remember("posts.{$path}", now()->addMinutes(30), fn () => file_get_contents($path));

        // of all the blog posts,
        // find the one with a slug that matches the one that was requested
        return static::getAll()->firstWhere('slug', $slug);
    }
}
