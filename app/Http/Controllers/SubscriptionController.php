<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subscription\SubscribeRequest;
use App\Http\Response\Response;
use App\Services\Contracts\SubscriptionService;

class SubscriptionController extends Controller
{
    public function __construct(
        protected SubscriptionService $subscriptionService,
        protected Response $responseService,
    ) {

    }

    public function subscribe(SubscribeRequest $request)
    {
        $this->subscriptionService->subscribe(
            userId: $request->input('user_id'),
            websiteId: $request->input('website_id')
        );

        return $this->responseService->success();
    }
}
