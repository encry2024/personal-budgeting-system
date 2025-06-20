<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Requests\Expense\RestoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
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
        $expenses = $this->expense->withTrashed()->get();

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
        if ($this->modelExists($this->expense, 'name', $storeExpenseRequest->input('name'))) {
            return redirect()->back()
                ->with('message', 'Expense name already exists and was only temporarily deleted.')
                ->with('messageColor', config('response.color.error'));
        }

        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');

        if ($expense->save()) {
            return redirect()->back()
                ->with('message', 'Expense "' . $expense->name . '" was successfully created.')
                ->with('model', $expense)
                ->with('messageColor', config('response.color.success'));
        }

        return redirect()->back()->with('message', 'Something went wrong, please try again later.');
    }

    /**
     * @param Expense $expense
     * @param UpdateExpenseRequest $updateExpenseRequest
     * @return RedirectResponse
     */
    public function update(Expense $expense, UpdateExpenseRequest $updateExpenseRequest): RedirectResponse
    {
        $expenseName = $expense->name;

        if ($this->modelExists($this->expense, 'name', $updateExpenseRequest->input('name'))) {
            return redirect()->back()
                ->with('message', 'Cannot update expense name to this name as it already exists and was only temporarily deleted.')
                ->with('messageColor', config('response.color.error'));
        }

        $updatedExpense = $expense->update(['name' => $updateExpenseRequest->input('name')]);

        if ($updatedExpense) {
            return redirect()->back()
                ->with('model', $expense)
                ->with('messageColor', config('response.color.success'))
                ->with("message", "Expense \"" . $expenseName . "\" was successfully updated to \"". $expense->name ."\".");
        }

        return redirect()->back()
            ->with('model', $expense)
            ->with('message', 'An error occurred while updating "'. $expenseName .'".')
            ->with('messageColor', config('response.color.error'));
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
                    'color' => config('response.json.color.success')
                ]);
        }

        return response()->json([
            'message' => 'An error occurred while deleting Expense.',
            'model' => $expense,
            'icon' =>  'error',
            'color' => config('response.json.color.error')
        ], 500);
    }

    public function restore($expenseId, RestoreExpenseRequest $request): JsonResponse
    {
        $expense = $this->restoreModel($this->expense, $expenseId);

        if ($expense instanceof $this->expense) {
            return response()->json([
                'message' => 'Expense "'.$expense->name.'" was successfully restored.',
                'model' => $expense,
                'icon' =>  'success',
                'color' => config('response.json.color.success')
            ]);
        }

        return response()->json([
            'message' => 'An error occurred while restoring Expense.',
            'icon' =>  'error',
            'color' => config('response.json.color.error')
        ], 500);
    }

    public function forceDelete($expenseId): JsonResponse
    {

    }
}
