<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use PharIo\Manifest\Author;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;


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
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});



Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "nama" => "kukuh kurniawan",
        "email" => "kukuh.kurniawantkj@gmail.com",
        "image" => "kukuh.jpg"
    ]);
});



//Halaman Posts
Route::get('/posts', [PostController::class, 'index']);



//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

//Halaman Category
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')

//     ]);
// });

//contoh yang salah tidak boleh ada yang double titik duanya 
// Route::get('/authors/{user::username}', function (User $user) {
//     return view('posts', [
//         'title' => 'User Posts',
//         'posts' => $user->posts,
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'categories',
//         'posts' => $author->posts->load('category', 'author'),

//     ]);
// });


// loggin (middleware auth itu untuk mengatisipasi orang yang tidak ada akun login)
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);


// Register (middleware guest itu untuk mengatisipasi orang yang belum register)
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard (middleware auth itu untuk mengatisipasi orang yang sudah resgistrasi tapi belum masukin akunnya)
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


// bagain Gabungin Javascript bagian Title
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// bagain dashboard dalam
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// bagian adminnya 
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin'); 