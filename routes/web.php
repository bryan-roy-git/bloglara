<?php

// use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

// Route::get('post', [App\Http\Controllers\PostController::class,'index']);

Route::prefix('dashboard')->group(function () {
    Route::resource('post', App\Http\Controllers\dashboard\PostController::class);
    Route::resource('category', App\Http\Controllers\dashboard\CategoryController::class);
    Route::resource('user', App\Http\Controllers\dashboard\UserController::class);

    Route::post('post/{post}/image',[App\Http\Controllers\dashboard\PostController::class, 'image'])->name('post.image'); // este metodo va a recibir un post
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
