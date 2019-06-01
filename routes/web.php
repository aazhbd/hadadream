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

Route::get('/', function () {
    $populars = App\Dream::orderBy('views')->get();
    View::share ( 'populars', $populars);

    $randoms = App\Dream::inRandomOrder()->get();
    View::share ( 'randoms', $randoms);

    $dreams = App\Dream::all();
    return view('home', compact('dreams'));
});

Route::post('/', 'DreamController@store');

Route::get('dream/{slug}', 'DreamController@show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('page/{slug}', function($slug){
    $populars = App\Dream::orderBy('views')->get();
    View::share ( 'populars', $populars);

    $randoms = App\Dream::inRandomOrder()->get();
    View::share ( 'randoms', $randoms);

    $post = App\Post::where('slug', '=', $slug)->firstOrFail();
    return view('post', compact('post'));
});


//Route::get('dream/{slug}', function($slug){
//    $post = App\Dream::where('slug', '=', $slug)->firstOrFail();
//    return view('post', compact('post'));
//});
