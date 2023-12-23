<?php

namespace App\Console\Commands;

use App\Mail\NewUserStory;
use App\Services\Contracts\SubscriptionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class SendStories extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-stories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send user stories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var SubscriptionService $subscriptionService */
        $subscriptionService = App::make(SubscriptionService::class);

        $unsentStories = $subscriptionService->getUnsentStories();
        foreach ($unsentStories as $unsentStory) {
            Mail::to($unsentStory->user)->queue(new NewUserStory(user: $unsentStory->user, post: $unsentStory->post));
            // after queuing the story, it will be consider as sent
            $subscriptionService->markAsSend($unsentStory->getId());
        }
    }
}
