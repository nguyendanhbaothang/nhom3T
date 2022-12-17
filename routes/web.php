<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/cc', function () {
    return view('admin.layout.home');
});

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
    Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::get('category/getTrashed',[CategoryController::class, 'getTrashed'])->name('categories.getTrashed');
    Route::delete('category/delete/{id}',[CategoryController::class, 'force_destroy'])->name('categories.delete');
    Route::get('category/restore/{id}',[CategoryController::class, 'restore'])->name('categories.restore');
});

//đơn hàng
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'find'])->name('order.detail');
    Route::get('/xuatexcel', [OrderController::class, 'exportOrder'])->name('orders.xuat');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
    Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
    Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
 });

Route::post('login',[UserController::class,'login'])->name('admin.login');
Route::get('checkLogin',[UserController::class,'viewLogin'])->name('admin.checkLogin');


Route::group(['prefix' => 'customers'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerControllerler::class, 'create'])->name('customers.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('destroy/{id}', [CustomermerController::class, 'destroy'])->name('customers.destroy');


});
Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    // trao quyền
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
   });

