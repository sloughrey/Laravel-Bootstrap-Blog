<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }
    
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|min:2']);
        $post->addComment(request('body'));

        return back();
    }
}
