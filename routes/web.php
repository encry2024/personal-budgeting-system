<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');


Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/user/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::get('expense', [ExpenseController::class, 'index'])->name('expense.index');
Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
