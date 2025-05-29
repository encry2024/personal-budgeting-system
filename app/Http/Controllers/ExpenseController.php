<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Models\Expense;

class ExpenseController extends Controller
{
    protected Expense $expense;

    //
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function index()
    {
        return view('expense.index');
    }

    public function create()
    {
        return view('expense.create');
    }

    public function store(StoreExpenseRequest $storeExpenseRequest)
    {
        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');
        $expense->save();

        return redirect()->back()
                ->with('message', 'Expense "' . $expense->name . '" was successfully created.')
                ->with('model', $expense);
    }

    public function update(Expense $expense, UpdateExpenseRequest $updateExpenseRequest)
    {
        $updatedExpense = $expense->update(['name' => $updateExpenseRequest->input('name')]);

        if ($updatedExpense) {
            return redirect()->back()->with('model', $expense)
                ->with("message", "Expense \"" . $updateExpenseRequest->input('name') . "\" was successfully updated.");
        } else {
            return redirect()->back()
                ->with('model', $expense)
                ->with('message', 'An error occurred while updating Expense.');
        }
    }
}
