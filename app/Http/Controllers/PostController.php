<?php

declare(strict_types= 1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{
    public function index(): Collection
    {
        return Post::all();
    }

    public function show(int $postId): ?Post
    {
        return Post::find($postId);
    }
}
