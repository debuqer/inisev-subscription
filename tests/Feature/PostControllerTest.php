<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_post(): void
    {
        $response = $this->get(route('website.post.create', [
            'title' => 'new post',
            'description' => 'new features added',
        ]));

        $response->assertStatus(200);
    }
}
