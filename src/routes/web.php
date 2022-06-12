<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [\App\Http\Controllers\PostsController::class, 'index'])->name('post.index');
Route::get('/post/{slug}', [\App\Http\Controllers\PostsController::class, 'show'])->name('post.show');
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

require __DIR__.'/auth.php';
