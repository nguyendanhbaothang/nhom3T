<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('category/getTrashed',[CategoryController::class, 'getTrashed'])->name('categories.getTrashed');
    Route::delete('category/delete/{id}',[CategoryController::class, 'force_destroy'])->name('categories.delete');
    Route::get('category/restore/{id}',[CategoryController::class, 'restore'])->name('categories.restore');
});


