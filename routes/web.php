<?php

declare(strict_types= 1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('auth')->group(function () {
//     Route::get('/register', [AuthController::class, 'register']);
//     Route::get('/login', [AuthController::class, 'login']);
// });

Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);