<?php

declare(strict_types= 1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IRepository
{
    public function getBy($arg): ?Model;
    public function create(array $data): Model;
}
