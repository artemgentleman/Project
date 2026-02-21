<?php

declare(strict_types= 1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\IRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IRepository
{
    public function getBy($arg): ?Model
    {
        return User::where("email", $arg)->first();
    }

    public function create(array $data): Model
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['$password'],
        ]);
    }
}