<?php

use App\Http\Controllers\Api\ApiCartController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login-customer', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});









Route::get('products',[ApiProductController::class,'index']);
Route::get('category_list',[ApiProductController::class,'category_list']);
Route::get('product_detail/{id}',[ApiProductController::class,'product_detail']);
Route::get('product_list/search',[ApiProductController::class,'search']);
Route::get('product_new',[ApiProductController::class,'product_new']);

Route::get('order/create', [ApiOrderController::class, 'create']);
Route::post('order/store', [ApiOrderController::class, 'store']);
Route::get('order/show/{id}', [ApiOrderController::class, 'show']);
Route::get('listorder/{id}', [ApiOrderController::class, 'listorder']);


Route::get('list-cart', [ApiCartController::class, 'getAllCart']);
    Route::get('add-to-cart/{id}', [ApiCartController::class, 'addToCart']);
    Route::get('remove-to-cart/{id}', [ApiCartController::class, 'removeToCart']);
    Route::get('remove-all-cart', [ApiCartController::class, 'removeAllCart']);
    Route::get('update-cart/{id}/{quantity}', [ApiCartController::class, 'updateCart']);






    Route::get('trendingProduct',[ApiProductController::class,'trendingProduct']);
    Route::get('add-to-cart-by-like/{id}', [ApiCartController::class, 'addToCartBylike']);
    Route::get('remove-to-cart-by-like/{id}', [ApiCartController::class, 'removeToCartBylike']);
    Route::get('list-cart-by-like', [ApiCartController::class, 'getAllCartByLike']);
