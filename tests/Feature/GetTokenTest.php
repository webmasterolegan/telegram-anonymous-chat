<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTokenTest extends TestCase
{
    use RefreshDatabase;

    const array USER_DATA = [
        'name' => 'Test User',
        'email' => 'test@email.ru',
        'password' => '12345678',
    ];

    public function test_validation_error(): void
    {
        $response = $this->postJson('/api/login', self::USER_DATA);

        $response->assertStatus(422);
    }

    public function test_get_auth_token_login_error(): void
    {
        $loginRequestData = [
            ...self::USER_DATA,
            'token_name' => 'test',
        ];

        $response = $this->postJson('/api/login', $loginRequestData);

        $response->assertStatus(401);
    }

    public function test_get_auth_token_login_success(): void
    {
        $loginRequestData = [
            ...self::USER_DATA,
            'token_name' => 'test',
        ];

        User::create([
            ...self::USER_DATA,
            'password' => bcrypt(self::USER_DATA['password']),
        ]);

        $response = $this->postJson('/api/login', $loginRequestData);

        $response->assertStatus(200);
    }
}
