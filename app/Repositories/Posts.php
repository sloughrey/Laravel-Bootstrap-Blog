<?php

namespace App\Repositories;

use App\Models\Post;
use App\Redis;

class Posts
{
    protected $redis; // example mocked redis

    public function __construct(Redis $redis)
    {
        $this->redis =  $redis;
    }

    public function all()
    {
        return Post::all();
    }
}