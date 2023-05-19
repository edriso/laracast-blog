<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\File;
// use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'category_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    // public $title;
    // public $excerpt;
    // public $body;
    // public $date;
    // public $slug;
    // public function __construct($title, $excerpt, $date, $body, $slug)
    // {
    //     $this->title = $title;
    //     $this->excerpt = $excerpt;
    //     $this->date = $date;
    //     $this->body = $body;
    //     $this->slug = $slug;
    // }
    // public static function getAll()
    // {
    //     $files = File::files(resource_path("posts"));

    //     return Cache::rememberForever('posts.all', fn () => collect($files)
    //         ->map(fn ($file) => YamlFrontMatter::parseFile($file))
    //         ->map(fn ($document) => new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug,
    //         ))
    //         ->sortByDesc('date'));

    //     // Cache::forget('posts.all'); // let's use it when making changes to $posts
    // }
    // public static function findOrFail($slug)
    // {
    //     $post = static::getAll()->firstWhere('slug', $slug);

    //     if (!$post) {
    //         throw new ModelNotFoundException();
    //     }

    //     return $post;
    // }
}
