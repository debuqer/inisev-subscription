<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public Post $post)
    {
        //
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
