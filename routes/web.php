<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::prefix('tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('tests.index');
    Route::get('/create', [TestController::class, 'create'])->name('tests.create');
    Route::post('/create', [TestController::class, 'store'])->name('tests.store');
    Route::get('/{tests}/edit', [TestController::class, 'edit'])->name('tests.edit');
    Route::put('/{tests}', [TestController::class, 'update'])->name('tests.update');
    Route::delete('/{tests}', [TestController::class, 'delete'])->name('tests.delete');
});


Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/list/{category}', [CategoryController::class, 'getTestsByCategory']);
    Route::delete('/{categories}' , [CategoryController::class, 'delete'])->name('categories.delete');
});
