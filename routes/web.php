<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;

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

    Route::name('category.')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/category/{category}/expense/create', [CategoryController::class, 'createCategoryExpense'])->name('create_category_expense');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('store');
        Route::post('/category/{category}/expense/store', [CategoryController::class, 'storeCategoryExpense'])->name('store_category_expense');
        Route::post('/category/{category}/update', [CategoryController::class, 'update'])->name('update');
        Route::post('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('/category/{category}/restore', [CategoryController::class, 'restore'])->name('restore');
        Route::post('/category/{category}/force_delete', [CategoryController::class, 'forceDelete'])->name('force_delete');
    });

    Route::name('expense.')->group(function () {
        Route::get('/expenses', [ExpenseController::class, 'index'])->name('index');
        Route::get('/expense/{expense}', [ExpenseController::class, 'show'])->name('show');
        Route::get('/expense/{category}/edit', [ExpenseController::class, 'edit'])->name('edit');
        Route::get('/expense/{category}/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/expense/store', [ExpenseController::class, 'store'])->name('store');
        Route::post('/expense/{expense}/update', [ExpenseController::class, 'update'])->name('update');
        Route::post('/expense/{expense}/delete', [ExpenseController::class, 'destroy'])->name('destroy');
        Route::post('/expense/{expense}/restore', [ExpenseController::class, 'restore'])->name('restore');
        Route::post('/expense/{expense}/force_delete', [ExpenseController::class, 'forceDelete'])->name('force_delete');
    });

    Route::name('attribute.')->group(function () {
        Route::get('/attributes', [AttributeController::class, 'index'])->name('index');
        Route::get('/attribute/{attribute}/edit', [AttributeController::class, 'edit'])->name('edit');
        Route::get('/attribute/create', [AttributeController::class, 'create'])->name('create');
        Route::post('/attribute/store', [AttributeController::class, 'store'])->name('store');
        Route::post('/attribute/{attribute}/update', [AttributeController::class, 'update'])->name('update');
        Route::post('/attribute/{attribute}/delete', [AttributeController::class, 'destroy'])->name('destroy');
        Route::post('/attribute/{attribute}/restore', [AttributeController::class, 'restore'])->name('restore');
        Route::post('/attribute/{attribute}/force_delete', [AttributeController::class, 'forceDelete'])->name('force_delete');
    });
});
