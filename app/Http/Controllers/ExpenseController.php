<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Exepnse\StoreExpenseRequest;

class ExpenseController extends Controller
{
    //

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
        $expense->name = $storeExpenseRequest['name'];
        $expense->save();

        return redirect()->back()->withMessage('Expense "', $expense->name,'" was successfully created.');
    }
}
