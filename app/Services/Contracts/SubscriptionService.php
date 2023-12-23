<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Support\LazyCollection;

interface SubscriptionService
{
    public function subscribe(string $userId, string $websiteId): void;

    public function createPostSubscribersList(Post $post): void;

    public function getUnsentStories(): LazyCollection;

    public function markAsSend(string $userStoryId): void;
}
