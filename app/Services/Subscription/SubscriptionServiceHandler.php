<?php

namespace App\Services\Subscription;

use App\Models\Post;
use App\Models\UserStory;
use App\Models\WebsiteSubscription;
use App\Services\Contracts\SubscriptionService;
use App\Services\Subscription\Exceptions\WebsiteAlreadySubscribed;
use Carbon\Carbon;
use Illuminate\Support\LazyCollection;

class SubscriptionServiceHandler implements SubscriptionService
{

    public function subscribe(string $userId, string $websiteId): void
    {
        throw_if($this->websiteSubscribedBefore($userId, $websiteId), WebsiteAlreadySubscribed::class);

        WebsiteSubscription::create([
            'user_id' => $userId,
            'website_id' => $websiteId,
        ]);
    }

    public function createPostSubscribersList(Post $post): void
    {
        $websiteSubscribers = $post->website->subscribers->pluck('user_id')->toArray();

        foreach ($websiteSubscribers as $subscriberId) {
            UserStory::create([
                'user_id' => $subscriberId,
                'post_id' => $post->getId(),
            ]);
        }
    }


    public function getUnsentStories(): LazyCollection
    {
        return UserStory::query()->whereNull('sent_at')->lazy(1);
    }

    private function websiteSubscribedBefore(string $userId, string $websiteId): bool
    {
        return WebsiteSubscription::query()->where('user_id', $userId)->where('website_id', $websiteId)->exists();
    }

    public function markAsSend(string $userStoryId): void
    {
        UserStory::where('id', $userStoryId)->update([
            'sent_at' => Carbon::now(),
        ]);
    }
}
