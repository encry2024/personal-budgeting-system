<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DestroyCategoryRequest;
use App\Http\Requests\Category\ForceDestroyCategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Expense;
use Auth;

class CategoryController extends Controller
{
    /*protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }*/

    public function index()
    {
        $expenseCategories = Category::withTrashed()->get();

        return view('category.index')->with('expenseCategories', $expenseCategories);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->user_id = $this->getCurrentUserId();

        if ($category->save()) {
            return redirect()->back()->with('message', 'Category "' . $category->name . '" was successfully created.')
                ->with('model', $category)
                ->with('messageColor', config('response.color.success'));
        }
    }

    public function createCategoryExpense(Category $category)
    {
        return view('expense.create')->withCategory($category);
    }

    public function storeCategoryExpense(Category $category, StoreExpenseRequest $storeExpenseRequest)
    {
        $expense = new Expense();
        $expense->name = $storeExpenseRequest->input('name');
        $expense->user_id = $this->getCurrentUserId();
        $expense->category_id = $category->id;

        if ($expense->save()) {
            return redirect()->back()
                ->with('message', 'Expense "' . $expense->name . '" was successfully created.')
                ->with('model', $expense)
                ->with('messageColor', config('response.color.success'));
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit')->withCategory($category);
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $updatedCategory = $category->update(['name' => $request->name]);

        if ($updatedCategory) {
            return redirect()->back()
                ->with('model', $category)
                ->with('messageColor', config('response.color.success'))
                ->with("message", 'Expense category "' . $categoryName . '" was successfully updated to "'. $category->name .'".');
        }

        return redirect()->back()
            ->with('model', $category)
            ->with('message', 'An error occurred while updating "'. $categoryName .'".')
            ->with('messageColor', config('response.color.error'));
    }

    public function destroy(DestroyExpenseRequest $request)
    {
        // code...
    }

    public function restore()
    {
        // code...
    }

    public function forceDelete()
    {
        // code...
    }
}
