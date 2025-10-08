<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Requests\Expense\RestoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Attribute;
use DB;

class ExpenseController extends Controller
{
    protected Expense $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function index(): View
    {
        $expenses = Expense::withTrashed()->whereUserId($this->getCurrentUserId())->get();

        return view('expense.index')->withExpenses($expenses);
    }

    public function show(Expense $expense)
    {
        return view('expense.show')->withExpense($expense);
    }

    public function edit(Expense $expense): View
    {
        return view('expense.edit')->with('expense', $expense);
    }

    public function create(Category $category): View
    {
        $attributes = Attribute::whereUserId($this->getCurrentUserId())->get();

        return view('expense.create')->withCategory($category)->withAttributes($attributes);
    }

    public function store(StoreExpenseRequest $storeExpenseRequest): RedirectResponse
    {
        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');
        $expense->user_id = $this->getCurrentUserId();

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
     * 
     * @return RedirectResponse
     */
    public function update(Expense $expense, UpdateExpenseRequest $updateExpenseRequest): RedirectResponse
    {
        $updatedExpense = $expense->update(['name' => $updateExpenseRequest->input('name')]);

        if ($updatedExpense) {
            return redirect()->back()
                ->with('model', $expense)
                ->with('messageColor', config('response.color.success'))
                ->with("message", 'Expense "' . $expenseName . '" was successfully updated to "'. $expense->name .'".');
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
        $expense = Expense::withTrashed()->findOrFail($expenseId);

        $isRestored = $expense->restore();

        if ($isRestored) {
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
        $expense = Expense::withTrashed()->find($expenseId);

        $expenseName = $expense->name;

        if ($expense->forceDelete()) {
            return response()->json([
                'message' => 'Expense "' . $expenseName . '" has been permanently deleted.',
                'icon' => 'success',
                'color' => config('response.json.color.success')
             ]);
        }
    }
}
