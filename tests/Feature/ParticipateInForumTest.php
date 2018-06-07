<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
    	$this->be(factory('App\User')->create());

    	$thread = factory('App\Thread')->create();

    	$reply = factory('App\Reply')->create();
    	$this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

    	$this->get($thread->path())
    		->assertSee($reply->body);
		//08:30
    }
}
