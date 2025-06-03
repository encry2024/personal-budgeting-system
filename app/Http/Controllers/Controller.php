<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

abstract class Controller
{
    protected function modelExists(Model $model, string $column, string $value): bool
    {
        $obj = $model->withTrashed()->where($column, $value)->first();

        if ($obj) {
            return true;
        }

        return false;
    }
}
