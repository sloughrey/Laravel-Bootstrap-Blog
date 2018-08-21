<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    /**
     * The title of the post
     *
     * @var string
     */
    protected $title;

    /**
     * The content of the post
     *
     * @var string
     */
    protected $body;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * The dates array is needed for soft deletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    //protected $guarded = [];

    /**
     * Returns all of the posts for this user
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Create the relationship to the Comment class and allows you to call "$this->comments" to get the related comments
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->id(); // the logged in user
        $this->comments()->create(compact('body', 'user_id')); // uses relationship from the "comments" function above
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Filters our query to only show the posts based on the provided filters (currently month and year)
     *
     * @param Illuminate\Database\Eloquent\Builder $query
     * @param Array $filters  The query filters
     * @return void
     */
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

        return $query;
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()->toArray();
    }

    /**
     * Returns an exerpt of the post body to show in the post listing
     *
     * @return string
     */
    public function getBodyExcerpt()
    {
        return substr($this->getAttribute('body'), 0, 200) . '...';
    }
}
