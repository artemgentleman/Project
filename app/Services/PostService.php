<?php

declare(strict_types= 1);

namespace App\Services;

use App\Models\Post;
use \Exception;

class PostService
{
    public function edit(array $data): void
    {
        $post = Post::find($data["postId"]);
        if ($post === null) {
            throw new Exception("Post with id: ". $data["postId"] .", not found");
        }
        $post->update([
            "title" => $data["title"],
            "description" => $data["description"],
        ]);
    }
}
