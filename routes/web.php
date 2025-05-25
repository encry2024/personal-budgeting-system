<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/user/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::name('expense.')->group(function () {
        Route::group(['prefix' => 'expense'], function () {
            Route::get('/', [ExpenseController::class, 'index'])->name('index');
            Route::get('/create', [ExpenseController::class, 'create'])->name('create');
            Route::post('/store', [ExpenseController::class, 'store'])->name('store');
            Route::post('/{expense}/update', [ExpenseController::class, 'update'])->name('update');
        });
    });
});
