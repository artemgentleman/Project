<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\IRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Services\IAuthService;

class AuthService implements IAuthService
{
    public function __construct(public IRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password): string
    {
        /**
         * @var User|null $user
         */
        $user = $this->userRepository->getBy($email);

        if (!$user) {
           throw new Exception('User not found');
        }
        
        if (!Hash::check($password, $user->password)) {
            throw new Exception('Invalid credentials');
        }

        return $user->createToken('api-token')->plainTextToken;
    }

    public function register(array $data): string
    {
        /** @var User $user */
        $user = $this->userRepository->create([
            'name' => $data['name'], 
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
        ]);

        return $user->createToken('api-token')->plainTextToken;
    }
}