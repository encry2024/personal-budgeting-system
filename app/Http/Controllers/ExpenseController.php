<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ExpenseController extends Controller
{
    protected Expense $expense;

    //
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function index(): View
    {
        $expenses = $this->expense->all();

        return view('expense.index')->with('expenses', $expenses);
    }

    public function create(): View
    {
        return view('expense.create');
    }

    public function store(StoreExpenseRequest $storeExpenseRequest): RedirectResponse
    {
        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');
        $expense->save();

        return redirect()->back()
                ->with('message', 'Expense "' . $expense->name . '" was successfully created.')
                ->with('model', $expense);
    }

    public function update(Expense $expense, UpdateExpenseRequest $updateExpenseRequest): RedirectResponse
    {
        $expenseName = $updateExpenseRequest->input('name');
        $updatedExpense = $expense->update(['name' => $updateExpenseRequest->input('name')]);

        if ($updatedExpense) {
            return redirect()->back()->with('model', $expense)
                ->with("message", "Expense \"" . $expenseName . "\" was successfully updated to \"". $updatedExpense->name ."\".");
        } else {
            return redirect()->back()
                ->with('model', $expense)
                ->with('message', 'An error occurred while updating Expense.');
        }
    }
}
