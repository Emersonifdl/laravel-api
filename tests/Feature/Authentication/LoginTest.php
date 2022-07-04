<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_should_validate_required_fields()
    {
        $this->postJson(route('api.auth.login'), [])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors([
                'email'    => __('validation.required', ['attribute' => 'email']),
                'password' => __('validation.required', ['attribute' => 'password']),
            ]);
    }

    /** @test */
    public function it_should_login_with_valid_credentials()
    {
        $this->postJson(route('api.auth.login'), [
            'email'    => $this->user->email,
            'password' => 'password',
        ])
             ->assertSuccessful()
             ->assertJsonStructure([
                 'token_type',
                 'access_token',
                 'expires_in',
             ]);
    }

    /** @test */
    public function it_should_not_login_with_invalid_credentials()
    {
        $this->postJson(route('api.auth.login'), [
            'email'    => $this->faker->email,
            'password' => $this->faker->password,
        ])
             ->assertStatus(Response::HTTP_UNAUTHORIZED)
             ->assertJson(['message' => 'Sorry, the email or password is incorrect.']);
    }
}
