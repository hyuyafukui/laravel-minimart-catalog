<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\SectionController;
use App\Http\controllers\ProductController;
use App\Http\controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');


    //Section
    Route::group(['prefix' => 'section', 'as' => 'section.'], function () {
        Route::get('/', [SectionController::class, 'index'])->name('index');
        Route::post('/store', [SectionController::class, 'store'])->name('store');
        Route::delete('/{id}/destroy', [SectionController::class, 'destroy'])->name('destroy');
    });

    //Product
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('destroy');
    });

    //User
    Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/update', [UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
});
