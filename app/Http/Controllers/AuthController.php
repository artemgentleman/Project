<?php

declare(strict_types= 1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(public AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();
  
        try {
            return response()->json([
                'token' => $this->authService->login($validated['email'], $validated['password']),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 401);
        }
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            return response()->json([
                'user' => $this->authService->register($request->validated()),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 401);
        }
    }
}
