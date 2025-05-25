<?php

namespace Tests\Feature\Expense;

use App\Models\Expense;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->actingAs($user);
    }

    /**
     * A basic feature test example.
     */
    public function test_expenses_add(): void
    {
        $this->post(route('expense.store'), [
            'name' => 'Test Expense'
        ]);

        $this->assertDatabaseHas('expenses', ['name' => 'Test Expense']);
    }

    public function test_expenses_update(): void
    {
        $expense = $this->post(route('expense.store'), [
            'name' => 'Test Expense'
        ]);

        $updateExpense = $this->post(route('expense.update', session('model')->id), [
            'name' => 'Test Expense Updated'
        ]);

        $this->assertEquals('Test Expense Updated', session('model')->name);
    }
}
