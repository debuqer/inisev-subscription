<?php

namespace App\Services\Blog;

use App\Events\PostCreated;
use App\Models\Post;
use App\Services\Contracts\BlogService;

class BlogServiceHandler implements BlogService
{

    public function createPost(string $websiteId, string $title, string $description): void
    {
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'website_id' => $websiteId,
        ]);

        event(new PostCreated($post));
    }
}
