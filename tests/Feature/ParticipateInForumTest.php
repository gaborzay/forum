<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** test */
    public function unauthenticated_users_may_not_add_replies()
    {
        // And an existing thread
        $thread = Thread::factory()->create();

        // When the user adds a reply to the thread
        $response = $this->post($thread->path().'/replies', []);
        $response->assertUnauthorized();
    }

    /** @test */
    public function an_authenticated_user_can_participate_in_a_forum_threads()
    {
        // Given we have an authenticated user
        $this->be(User::factory()->create());

        // And an existing thread
        $thread = Thread::factory()->create();

        // When the user adds a reply to the thread
        $reply = Reply::factory()->make();
        $this->post($thread->path().'/replies', $reply->toArray());

        // Then their reply should be visible on the page.
        $this->get($thread->path())->assertSee($reply->body);
    }
}
