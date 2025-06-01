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

    Route::name('user.')->group(function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/settings', [UserController::class, 'settings'])->name('settings');
            Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::post('/user/{user}/update', [UserController::class, 'update'])->name('update');
            Route::post('/user/{user}/delete', [UserController::class, 'destroy'])->name('destroy');
        });
    });

    Route::name('expense.')->group(function () {
        Route::get('/expenses', [ExpenseController::class, 'index'])->name('index');
        Route::get('/expense/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/expense/store', [ExpenseController::class, 'store'])->name('store');
        Route::post('/expense/{expense}/update', [ExpenseController::class, 'update'])->name('update');
    });
});
