<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddUser extends TestCase
{
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
        $user = new User();
        $user->first_name = "First Name";
        $user->middle_name = "Middle Name";
        $user->last_name = "Last Name";
        $user->email = "test@email.com";
        $user->password = bcrypt('password');

        $this->assertInstanceOf(User::class, $user);
    }
}
