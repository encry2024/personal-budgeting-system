<?php

namespace Tests\Feature\Expense;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->category = Category::factory()->create();
        $this->category->user_id = $this->user->id;
        $this->category->save();

        $this->actingAs($this->user);
    }

    private function testData(): array
    {
        return [
            'name' => 'Test Expense',
            'user_id' => $this->user->id,
            'category_id' => $this->category->id
        ];
    }

    /**
     * A basic feature add expense.
     */
    public function test_expenses_add(): void
    {
        $this->post(route('expense.store'), [
            'name' => $this->testData()['name'],
            'user_id' => $this->user->id,
            'category_id' => $this->category->id
        ]);

        $this->assertDatabaseHas('expenses', ['name' => 'Test Expense']);
    }

    /**
     * A basic feature update expense.
     */
    public function test_expenses_update(): void
    {
        $expense = Expense::factory()->create();
        
        $this->actingAs($this->user);

        $this->post(route('expense.update', $expense->id), $this->testData());

        $expense->refresh();

        $this->assertDatabaseHas('expenses', ['name' => 'Test Expense']);

        $this->assertEquals($this->testData()['name'], $expense->name);
    }
}
