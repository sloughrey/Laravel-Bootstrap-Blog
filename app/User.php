<?php

namespace App;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The dates array is needed for soft deletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns all of the posts for this user
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Configures the user relationship to comments
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Saves a post for this user
     *
     * @param Post $post The post that is being saved
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    /**
     * Bans the user from using the system and soft deletes their posts and comments
     *
     * @return boolean
     */
    public function ban()
    {
        // permanently delete all the comments and posts
        // $this->comments->forceDelete();
        // $this->posts->forceDelete();

        // soft delete all of the posts
        $this->comments()->delete();
        $this->posts()->delete();

        // log the user out
        Auth::logout();

        // soft delete the user
        $this->delete();

        return true;
    }

    /**
     * Unbans a user that was previously banned
     *
     * @param String $restoreContent Restore prior soft deleted content
     *
     * @return void
     */
    public function unban($restoreContent = false)
    {
        $this->comments->restore();
        $this->posts->restore();

        return true;
    }

    /**
     * Checks to see if a user with the given email exists
     *
     * @param string $email
     *
     * @return void
     */
    public static function checkEmailExists($email)
    {
        if (User::where('email', $email)->count() == 0) {
            return false;
        }

        return true;
    }
}
