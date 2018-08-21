<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Post', 5)->create(/* ['user_id' => factory('App\User')->create()->id] */)->each(function ($p) {

            $p->user_id = factory('App\User')->create()->id;
            // create a new category and assign it here
            $cat = factory('App\Models\Category')->create();
            $p->categories()->attach($cat);

            // create a few new comments and assign them here
            for ($x = 0; $x <= 2; $x++) {
                $comment = factory('App\Models\Comment')->create(['post_id' => $p->id]);
                $p->comments()->save($comment);
            }

            // create a few new tags and assign them here
            for ($x = 0; $x <= 1; $x++) {
                $tag = factory('App\Models\Tag')->create();
                $p->tags()->save($tag);
            }
        });

        $post = App\Models\Post::all()->first();
        
        $post = \App\Models\Post::all()->last();
        $post->featured_sort = 1;
        $post->save();
    }
}
