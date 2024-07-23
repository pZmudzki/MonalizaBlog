<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::put('/post/{post}/archive', [PostController::class, 'archive'])->name('post.archive');
Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);

Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');
