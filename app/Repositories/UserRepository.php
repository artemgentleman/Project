<?php

declare(strict_types= 1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getByEmail(string $email): ?User
    {
        return User::where("email", $email)->first();
    }

    public function create(string $name, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}