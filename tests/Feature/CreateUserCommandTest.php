<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserCommandTest extends TestCase
{
    use RefreshDatabase;

    public const string NAME = 'Admin';

    public const string PASSWORD = '12345678';

    public const string EMAIL = 'admin@mail.ru';

    /**
     * A basic feature test example.
     */
    public function test_create_user(): void
    {
        $this->artisan('app:create-user')
            ->expectsQuestion(__('console.create_user.name'), self::NAME)
            ->expectsQuestion(__('console.create_user.email'), self::EMAIL)
            ->expectsQuestion(__('console.create_user.password'), self::PASSWORD)
            ->expectsOutputToContain('успешно создан')
            ->doesntExpectOutputToContain('не пройдена')
            ->assertExitCode(0);

        $user = User::whereEmail(self::EMAIL)->first();

        $this->assertTrue(isset($user));
    }
}
