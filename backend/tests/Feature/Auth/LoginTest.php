<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success', 'message',
                'data' => ['user' => ['id', 'name', 'email'], 'token', 'token_type'],
            ]);
    }

    public function test_user_cannot_login_with_wrong_password(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])->assertUnprocessable();
    }
}
