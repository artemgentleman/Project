<?php

declare(strict_types= 1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::prefix('auth')->group(function (): void {
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login']);
});