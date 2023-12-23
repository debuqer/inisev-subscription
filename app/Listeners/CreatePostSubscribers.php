<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Services\Contracts\SubscriptionService;


class CreatePostSubscribers
{
    /**
     * Create the event listener.
     */
    public function __construct(protected SubscriptionService $subscriptionService)
    {
        //
    }

    /**
     * @param PostCreated $event
     * @return void
     */
    public function handle(object $event): void
    {
        $this->subscriptionService->createPostSubscribersList($event->getPost());
    }
}
