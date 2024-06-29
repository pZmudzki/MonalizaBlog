<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect()->route('post.index');
});

Route::resource('post', PostController::class);
