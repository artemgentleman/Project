<?php

declare(strict_types= 1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);