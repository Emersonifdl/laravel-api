<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use Tests\TestCase;

class MeTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }
    /** @test */
    public function it_should_not_be_able_to_show_user_profile_without_being_authenticated()
    {
        $this->getJson(route('api.auth.me'))
            ->assertUnauthorized();
    }

    /** @test */
    public function it_should_show_user_profile()
    {
        $this->actingAs($this->user)
            ->getJson(route('api.auth.me'))
            ->assertOk()
            ->assertJsonFragment([
                'id'           => $this->user->id,
                'name'   => $this->user->name,
                'email'        => $this->user->email,
            ]);
    }
}
