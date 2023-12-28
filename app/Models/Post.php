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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function author()
    {
        // in the relation if you didn't specify the FK,
        // Laravel will assume it's 'methodName_id', i.e. here 'author_id'
        // return $this->belongsTo(User::class);

        // Specify the foreign key if it's different from the assumed 'author_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}