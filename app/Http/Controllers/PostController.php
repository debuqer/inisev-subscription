<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Services\Contracts\BlogService;
use App\Http\Response\Response;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function __construct(
        protected Response $response,
        protected BlogService     $blogService,
    ) {

    }

    public function create(CreateRequest $request): JsonResponse
    {
        $this->blogService->createPost(
            websiteId: $request->input('website_id'),
            title: $request->input('title'),
            description: $request->input('description')
        );

        return $this->response->success();
    }
}
