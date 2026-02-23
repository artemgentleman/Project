<?php

declare(strict_types= 1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\EmptyMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([EmptyMiddleware::class])->group(function () {
    Route::group(attributes: ['prefix'=> 'posts'], routes: function (): void {
        Route::get('/', [PostController::class,'index']);
        Route::get('/{id}', [PostController::class, 'show']);
        Route::post('/edit', [PostController::class, 'edit']);
    });
});
