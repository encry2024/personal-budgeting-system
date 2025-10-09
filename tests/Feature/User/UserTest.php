<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private function testData(): array
    {
        return [
            'first_name' => 'Test User 1',
            'middle_name' => '',
            'last_name' => 'Test User 1 Last Name',
            'email' => 'test123@user.com',
            'password' => '123321',
            'password_confirmation' => '123321'
        ];
    }

    /**
     * A basic feature test example.
     */
    public function test_add_user(): void
    {
        $response = $this->post(route('user.store'), $this->testData());

        $this->assertDatabaseHas('users', [
            'first_name' => $this->testData()['first_name'],
            'last_name' => $this->testData()['last_name'],
            'email' => $this->testData()['email']
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_update_user(): void
    {
        // Create a user and give authorization because the update function needs authenticated user.
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('user.update', $user->id), $this->testData());
        $this->assertDatabaseHas('users', [
            'first_name' => $this->testData()['first_name'],
            'last_name' => $this->testData()['last_name'],
            'email' => $this->testData()['email']
        ]);

        $this->assertEquals('Test User 1', $this->testData()['first_name']);
    }
}
