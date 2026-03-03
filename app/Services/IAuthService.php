<?php

declare(strict_types= 1);

namespace App\Services;

interface IAuthService
{
    public function login(string $email, string $password): string;
    public function register(array $data): string;
}