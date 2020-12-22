<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $thread = create(Thread::class);

        $this->post($thread->path().'/replies', [], [
            'Accept' => 'application/json'
        ])->assertUnauthorized();
    }

    /** @test */
    public function an_authenticated_user_can_participate_in_a_forum_threads()
    {
        $this->signIn();

        $thread = create(Thread::class);

        $reply = make(Reply::class);
        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }

    /** @test */
    public function a_reply_requires_a_body()
    {
        $this->signIn();

        $thread = create(Thread::class);

        $reply = make(Reply::class, ['body' => null]);
        $this->post($thread->path().'/replies', $reply->toArray())
            ->assertSessionHasErrors();
    }
}
