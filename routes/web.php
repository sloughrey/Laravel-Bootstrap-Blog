<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
// registerring a class in the service container examples  (bind can have different instances, singleton should always return the same one)
App::bind('App\Billing\Stripe', function () {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});
App::singleton('App\Billing\Stripe', function () {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});

// These do the same thing
$stripe = resolve('App\Billing\Stripe');
$stripe = app('App\Billing\Stripe');
$stripe = App::make('App\Billing\Stripe');

// Sets the instance in the service container
App::instance('App\Billing\Stripe', $stripe);

dd($stripe); */



// Login & Authentication Related Routes
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Post Routes
Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentController@store'); // this line might mess up the next line?
Route::get('/posts/{post}', 'PostController@show'); // This route MUST come last since it has a wildcard

// Category Routes
Route::get('/posts/categories/{cat}', 'CategoryController@index');

// Tag Routes
Route::get('/posts/tags/{tag}', 'TagController@index');

// Task Routes
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');
