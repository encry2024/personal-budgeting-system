<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
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

    public function edit(Expense $expense): View
    {
        return view('expense.edit')->with('expense', $expense);
    }

    public function create(): View
    {
        return view('expense.create');
    }

    public function store(StoreExpenseRequest $storeExpenseRequest): RedirectResponse
    {
        if ($this->modelExists($this->expense, 'name', $storeExpenseRequest->input('name')) instanceof Expense) {
            return redirect()->back()
                ->with('message', 'Cannot update expense name to this name as it already exists .')
                ->with('messageColor', 'bg-red-500');
        }

        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');

        if ($expense->save()) {
            return redirect()->back()
                ->with('message', 'Expense "' . $expense->name . '" was successfully created.')
                ->with('model', $expense)
                ->with('messageColor', 'bg-green-500');
        }

        return redirect()->back()->with('message', 'Something went wrong, please try again later.');
    }

    /**
     * @TODO check if the user input is the same as the current name of the expense
     * if yes: return different message
     *
     * @param Expense $expense
     * @param UpdateExpenseRequest $updateExpenseRequest
     * @return RedirectResponse
     */
    public function update(Expense $expense, UpdateExpenseRequest $updateExpenseRequest): RedirectResponse
    {
        $expenseName = $expense->name;

        if ($this->modelExists($this->expense, 'name', $updateExpenseRequest->input('name'))) {
            return redirect()->back()
                ->with('message', 'Expense already exists!')
                ->with('messageColor', 'bg-red-500');
        }

        $updatedExpense = $expense->update(['name' => $updateExpenseRequest->input('name')]);

        if ($updatedExpense) {
            return redirect()->back()
                ->with('model', $expense)
                ->with('messageColor', 'bg-green-500')
                ->with("message", "Expense \"" . $expenseName . "\" was successfully updated to \"". $expense->name ."\".");
        }

        return redirect()->back()
            ->with('model', $expense)
            ->with('messageColor', 'bg-red-500')
            ->with('message', 'An error occurred while updating "'. $expenseName .'".');
    }

    public function destroy(Expense $expense): JsonResponse
    {
        $expenseName = $expense->name;

        if ($expense->delete()) {
            return response()
                ->json([
                    'message' => 'Expense "' . $expenseName . '" was successfully deleted.',
                    'model' => $expense,
                    'icon' =>  'success',
                    'color' => '#00a63e',
                    'status' => 200
                ]);
        }

        return response()->json([
            'message' => 'An error occurred while deleting Expense.',
            'model' => $expense,
            'icon' =>  'error',
            'color' => '#ea5b5b',
            'status' => 500
        ], 500);
    }
}
