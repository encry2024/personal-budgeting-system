<?php

namespace Tests\Feature\Expense;

use App\Models\Expense;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddExpenseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_expenses_add(): void
    {
        $expense = $this->post(route('expense.store'), [
            'name' => 'John Doe'
        ]);

        $this->assertInstanceOf(Expense::class, $expense);
    }
}
