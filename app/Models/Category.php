<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
