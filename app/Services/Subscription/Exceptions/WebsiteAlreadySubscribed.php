<?php

namespace App\Services\Subscription\Exceptions;

use App\Exceptions\HttpException;

class WebsiteAlreadySubscribed extends HttpException
{
    protected $message = 'Website already subscribed';
}
