<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', PostController::class);

Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');
