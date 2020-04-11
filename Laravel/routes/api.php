<?php

use App\Cakeapp\User;
use App\Http\Resources\UserResource as UserResource;
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

Route ::middleware('auth:api') -> get('/user', function (Request $request) {
    return $request -> user();
});

Route ::namespace('Api/Location') -> group(function () {
    Route ::resource('wards', 'WardController');
    Route ::resource('municipals', 'MunicipalController');
});

Route ::namespace('User') -> group(function () {
    Route ::resource('users', 'UserController');
});

Route ::namespace('Vendor') -> group(function () {
    Route ::resource('shops', 'ShopController');
});

Route ::namespace('Product') -> group(function () {
    Route ::resource('products', 'ProductController');
});

Route ::namespace('Purchase') -> group(function () {
    Route ::resource('carts', 'CartController');
    Route ::resource('orders', 'OrderController');
    Route ::resource('purchases', 'PurchasesController');
});

Route ::namespace('Payment') -> group(function () {
    Route ::resource('payments', 'PaymentController');
});

Route ::namespace('Delivery') -> group(function () {
    Route ::resource('deliveries', 'DeliveryController');
});


