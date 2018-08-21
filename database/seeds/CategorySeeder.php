<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory('App\Models\Category', 5)->create()->each(function ($c) {

            $post = Post::doesntHave('categories')->first();
            if ($post) {
                $post->categories()->attach($c->id);
            }
        }); */
    }
}
