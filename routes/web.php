<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
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


Auth::routes();

Route::post('/follow/{user}', [FollowsController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile/{user}', [ProfileControler::class, 'index'])->name('profile.show');

Route::get('/profile/{user}/edit', [ProfileControler::class, 'edit'])->name('profile.edit');

Route::patch('/profile/{user}', [ProfileControler::class, 'update'])->name('profile.update');

Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('/p/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/p', [PostsController::class, 'store'])->name('posts.store');
Route::get('/p/{post}', [PostsController::class, 'show'])->name('posts.show');
