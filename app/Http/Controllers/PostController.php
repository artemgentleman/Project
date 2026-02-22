<?php

declare(strict_types= 1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    public function show(int $postId): View
    {
        return view('posts.show', ['post'=> Post::find($postId)]);
    }

    public function edit(int $postId)
    {
        
    }
}
