<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\Events\UserWasBanned;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index(Posts $posts) // Dependency Injected repository
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->paginate(3);
        
        // use of first() returns the object instead of a collection
        $featuredPost = Post::where('featured_sort', 1)->first();

        return view('posts.index', compact('posts', 'featuredPost'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Create new post from request
        /* $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save(); */

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $user = auth()->user();
        $numPosts24hr = $user->posts()
            ->where('created_at', '>', Carbon::now()->subDays(1))
            ->count();
        
        // bans the user if more than 3 posts in 24 hr rolling window
        $maxPost24hr = 3;
        if ($numPosts24hr >= $maxPost24hr) {
            if ($user->ban()) {
                event(new UserWasBanned());
            }

            return view('users.banned');
        }
        
        $user->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('Your post has now been published');


        return redirect('/');
    }
}
