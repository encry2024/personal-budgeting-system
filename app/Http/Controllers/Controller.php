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
}
