<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\IAuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(public IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json([
            'token' => $this->tryMethod(function () use ($validated) {
                return $this->authService->login(
                    $validated['email'],
                    $validated['password'],
                );
            }),
        ], 200);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json([
            'token' => $this->tryMethod(function () use ($validated) {
                return $this->authService->register($validated);
            }),
        ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successfuly',
        ]);
    }
}
