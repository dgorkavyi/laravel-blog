<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/category/{category:slug}', [PostController::class, 'category'])->name('post.category');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show');
