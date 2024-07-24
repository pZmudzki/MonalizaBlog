<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Middleware\RegisterUserVisit;

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', PostController::class)->only(['index', 'show'])->middleware(RegisterUserVisit::class);
Route::resource('post', PostController::class)->except(['index', 'show']);
Route::put('/post/{post}/archive', [PostController::class, 'archive'])->name('post.archive');

Route::resource('comment', CommentController::class);

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');

Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
