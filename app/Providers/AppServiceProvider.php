<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * framework is fully loaded by the time it gets to this boot function
     *
     * @return void
     */
    public function boot()
    {
        // Adds the archives variable to every page with a view composer called snippets.sidebar
        view()->composer('snippets.sidebar', function ($view) {
            $archives = Post::archives();
            $tags =  Tag::has('posts')->pluck('name');
            $view->with(compact('archives', 'tags'));
        });
        
        // Adds category data whenever the snippets/nav view is loaded
        view()->composer('snippets.nav', function ($view) {
            $categories = Category::all();
            $view->with(compact('categories'));
        });
    }

    /**
     * Register any application services into the service container.
     *
     * @return void
     */
    public function register()
    {

    }
}
