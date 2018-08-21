<?php

use App\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tag;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('tester'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph . ' ' . $faker->paragraph . ' ' . $faker->paragraph . "\r\n\r\n" . $faker->paragraph . ' ' . $faker->paragraph . "\r\n\r\n" . $faker->paragraph . ' ' . $faker->paragraph,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        }
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    do {
        $name = ucwords($faker->word);
    } while (Tag::where('name', $name)->count() > 0);
    return [
        'name' => $faker->word
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    do {
        $name = ucwords($faker->word);
    } while (Category::where('name', $name)->count() > 0);
    return [
        'name' => $name
    ];
});
