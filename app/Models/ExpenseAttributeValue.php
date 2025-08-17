<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;

class ExpenseAttributeValue extends Model
{
    //

    protected $table = 'expense_attribute_values';

    protected $fillable = ['expense_id', 'attribute_id', 'value'];

    public function expense()
    {
        return $this->balongsTo(Expense::class);
    }
}
