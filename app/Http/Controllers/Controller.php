<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Auth;

abstract class Controller
{
    public function getCurrentUserId()
    {
        return Auth::user()->id;
    }

    protected function modelExists(Model $model, string $column, string $value): bool
    {
        $obj = $model->withTrashed()->where($column, $value)->first();

        if ($obj) {
            return true;
        }

        return false;
    }

    protected function restoreModel(Model $model, $id): Model|bool
    {
        $obj = $model->onlyTrashed()->find($id)->restore();

        if ($obj) {
            return $model->find($id);
        }

        return false;
    }

    protected function messageBuilder()
    {
        
    }
}
