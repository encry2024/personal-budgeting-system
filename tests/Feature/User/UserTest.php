<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function userData(): array
    {
        return [
            'user_type_id'      => 1,
            'user_id'           => 3,
            'first_name'        => "First Name",
            'middle_name'       => "Middle Name",
            'last_name'         => "Last Name",
            'email'             => 'test@email.com',
            'username'          => 'test_user',
            'password'          => 'password'
        ];
    }

    /**
     * A basic feature test example.
     */
    public function test_add_user(): void
    {
        $response = $this->post(route('user.store'), [
            'first_name' => 'Test User 1',
            'middle_name' => '',
            'last_name' => 'Test User 1 Last Name',
            'email' => 'test123@user.com',
            'password' => '123321',
            'password_confirmation' => '123321'
        ]);

        $this->assertDatabaseHas('users', ['id' => session('model')->id]);
    }
}
