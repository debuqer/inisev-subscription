<?php

namespace App\Services\Contracts;

interface BlogService
{
    public function createPost(string $websiteId, string $title, string $description): void;
}
