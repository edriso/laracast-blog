<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\File;
// use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            // $query
            //     ->whereExists(fn($query) =>
            //         $query->from('categories')
            //             // notice below where clause looking for a value in the 2nd parameter
            //             // so it treated 'posts.category_id' as a string, but we want posts.category_id
            //             // ->where('categories.id', 'posts.category_id')
            //                 //using clockwork: SELECT * FROM `posts` WHERE EXISTS (SELECT * FROM `categories` WHERE `categories`.`id` = 'posts.category_id' and `categories`.`slug` = 'cum-id-aliquid-occaecati-et-consequatur-illum-quod') ORDER BY `created_at` DESC

            //             ->whereColumn('categories.id', 'posts.category_id')
            //                 //SELECT * FROM `posts` WHERE EXISTS (SELECT * FROM `categories` WHERE `categories`.`id` = `posts`.`category_id` and `categories`.`slug` = 'cum-id-aliquid-occaecati-et-consequatur-illum-quod') ORDER BY `created_at` DESC
            //             ->where('categories.slug', $category)
            //     )

            $query
                //'category' below corresponds to category() relationship
                ->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
                )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->whereHas('author', fn($query) =>
                    $query->where('username', $author)
                )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // in the relation if you didn't specify the FK,
        // Laravel will assume it's 'methodName_id', i.e. here 'author_id'
        // return $this->belongsTo(User::class);

        // Specify the foreign key if it's different from the assumed 'author_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}