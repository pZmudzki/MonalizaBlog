<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', PostController::class);
Route::middleware('visit')->resource('post', PostController::class)->only(['index', 'show']);
Route::middleware('view')->resource('post', PostController::class)->only('show');
Route::put('/post/{post}/archive', [PostController::class, 'archive'])->name('post.archive');

Route::middleware('throttle:comments')->resource('comment', CommentController::class)->only(['store']);
Route::resource('comment', CommentController::class)->only(['destroy']);
Route::put('/comment/{comment}/highlight', [CommentController::class, 'highlight'])->name('comment.highlight');

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');

Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts')->middleware('auth');
