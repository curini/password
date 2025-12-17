<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Socialite\Socialite;
use Laravel\Socialite\Two\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_user_to_github()
    {
        Socialite::fake('github');
        $response = $this->get('/app-auth/redirect?driver=github');
        $response->assertRedirect();
    }

    public function test_callback_success()
    {
        Socialite::fake('github', (new User)->map([
            'id' => 'github-123',
            'name' => 'Jason Beggs',
            'email' => 'jason@example.com',
        ]));

        $response = $this->get('/app-auth/callback?driver=github');
        $response->assertRedirect(config('app.socialite_redirect.success'));

        $this->assertDatabaseHas('users', [
            'name' => 'Jason Beggs',
            'email' => 'jason@example.com',
        ]);
    }
}
