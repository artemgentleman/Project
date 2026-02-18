<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(public UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password): string
    {
        /**
         * @var User|null $user
         */
        $user = $this->userRepository->getByEmail($email);

        if (!$user) {
           throw new Exception('User not found');
        }
        
        if (!Hash::check($password, $user->password)) {
            throw new Exception('Invalid credentials');
        }

        return $user->createToken('api-token')->plainTextToken;
    }

    public function register(array $data): User
    {
        return $this->userRepository->create(
            $data['name'], 
            $data['email'], 
            Hash::make($data['password'],
        ));
    }
}