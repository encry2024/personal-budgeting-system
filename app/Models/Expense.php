<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ExpenseAttributeValue;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    //
    use SoftDeletes, HasFactory;

    protected $fillable = ['user_id', 'name', 'category_id'];

    public function attributes()
    {
        return $this->hasMany(ExpenseAttributeValue, 'expense_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
