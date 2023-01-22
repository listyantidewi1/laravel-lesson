<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('home.index', []);
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');


//dummy data
$posts = [
    1 => [
        'title' => 'Introduction to Laravel',
        'content' => 'This is a short introduction to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Introduction to PHP',
        'content' => 'This is a short introduction to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Introduction to Golang',
        'content' => 'This is a short introduction to Go Language',
        'is_new' => false
    ]
];

//multiple action controller
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

//single action controller
Route::get('/single', AboutController::class);



//implementing route for resource controller, only for index and show methods
Route::resource('posts', PostsController::class)->only('index', 'show', 'create', 'store');

// Route::get('/posts', function () use ($posts) {
//     //dd(request()->all());
//     //input will look for the names of all possible inputs. query will look for a specific query parameter
//     dd((int)request()->query('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });

// Route::get('/posts/{id}', function ($id) use ($posts) {

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id]]);
// })
//     // ->where([
//     //     'id' => '[0-9]+'
//     // ])
//     ->name('posts.show');


Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index')->middleware('auth');

// Route::get('/posts/2', function () {
//     return 'Blog post 2';
// });

//group routes which have the same prefix
Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    //learn to display response as json
    Route::get('responses', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'listyantidewi', 3600);
    })->name('response');


    //learn to redirect response to a different route
    Route::get('redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    //used to back one page to the last address
    Route::get('back', function () {
        return back();
    })->name('back');

    //redirect to a route by referencing its name
    Route::get('named-route', function () {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');

    //redirect away to external site
    Route::get('away', function () {
        return redirect()->away('https://www.google.com');
    })->name('away');


    //return a json response
    Route::get('json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    //returning file download
    Route::get('/fun/download', function () use ($posts) {
        return response()->download(public_path('/PHOTOKU.png'), 'portrait.jpg');
    })->name('download');
});
