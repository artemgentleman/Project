<?php

namespace App\Jobs;

use App\Services\PostService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class EditPostJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Execute the job.
     */
    public function handle(array $data): void
    {
        $this->postService->edit($data);
    }
}
