<?php

namespace App\Models;

use App\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The dates array is needed for soft deletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The fillable Comment properties
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id']; // post_id gets set from the Post model's relationship to the Comment class

    /**
     * Returns the Post object associated to this comment
     *
     * @return Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user() // $comment->user->name
    {
        return $this->belongsTo(User::class);
    }
}
