<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\RoleController;
use App\Http\Controllers\Pages\AccountController;
use App\Http\Controllers\Pages\PostController;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index')->middleware(['adminAble']);
        Route::get('/create', [RoleController::class, 'create'])->name('role.create')->middleware(['adminAble']);
        Route::post('/store', [RoleController::class, 'store'])->name('role.store')->middleware(['adminAble']);
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit')->middleware(['adminAble']);
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update')->middleware(['adminAble']);
        Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete')->middleware(['adminAble']);
    });

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('account.index')->middleware(['adminAble']);
        Route::get('/create', [AccountController::class, 'create'])->name('account.create')->middleware(['adminAble']);
        Route::post('/store', [AccountController::class, 'store'])->name('account.store')->middleware(['adminAble']);
        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('account.edit')->middleware(['adminAble']);
        Route::post('/update/{id}', [AccountController::class, 'update'])->name('account.update')->middleware(['adminAble']);
        Route::delete('/delete/{id}', [AccountController::class, 'delete'])->name('account.delete')->middleware(['adminAble']);
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
        // Route::get('/check-status/{id}', [PostController::class, 'checkStatus'])->name('post.checkStatus')->middleware(['authorAble']);

    });
});

