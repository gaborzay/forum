<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** test */
    public function unauthenticated_users_may_not_add_replies()
    {
        // And an existing thread
        $thread = create(Thread::class);

        // When the user adds a reply to the thread
        $response = $this->post($thread->path().'/replies', []);
        $response->assertUnauthorized();
    }

    /** @test */
    public function an_authenticated_user_can_participate_in_a_forum_threads()
    {
        // Given we have an authenticated user
        $this->signIn();

        // And an existing thread
        $thread = create(Thread::class);

        // When the user adds a reply to the thread
        $reply = make(Reply::class);
        $this->post($thread->path().'/replies', $reply->toArray());

        // Then their reply should be visible on the page.
        $this->get($thread->path())->assertSee($reply->body);
    }
}
