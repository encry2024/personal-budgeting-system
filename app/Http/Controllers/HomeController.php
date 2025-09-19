<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController
{
    /**
     * Display a listing of the resource.
     */
    public function login(): View
    {
        return view('login');
    }
}
