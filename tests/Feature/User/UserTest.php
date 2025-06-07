<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     */
    public function test_add_user(): void
    {
        $user = $this->post(route('user.store'), [
            'first_name' => 'Test User 1',
            'middle_name' => '',
            'last_name' => 'Test User 1 Last Name',
            'email' => 'test123@user.com',
            'password' => '123321',
            'password_confirmation' => '123321'
        ]);

        $this->assertDatabaseHas('users', ['id' => session('model')->id]);
    }

    public function test_update_user(): void
    {
        // Create a user and give authorization because the update function needs authenticated user.
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('user.update', $user->id), [
            'first_name' => 'Test User Update Module',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'email' => 'email@email.com',
            'password' => '123321',
            'password_confirmation' => '123321'
        ]);

        $this->assertEquals('Test User Update Module', session('model')->first_name);
    }
}
