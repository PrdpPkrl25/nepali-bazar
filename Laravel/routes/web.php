<?php

use Illuminate\Support\Facades\Auth;
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


/*Route::get('/',function (){
    return view('home');
});*/

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route ::namespace('Auth') -> group(function () {
Route::get('auth/redirect/{provider}', 'LoginController@redirectToProvider')->name('provider.redirect');
Route::get('auth/callback/{provider}', 'LoginController@handleProviderCallback')->name('provider.callback');

});

Route ::namespace('Web\User') -> group(function () {
    Route ::get('/account', 'UserController@show')->name('user.profile');
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::post('/roles/{role_id}/{permission_id}', 'RoleController@update')->name('roles.update');
});

Route ::namespace('Web\Vendor') -> group(function () {
    Route ::get('shop/create', 'ShopController@create')->name('shop.create')->middleware('auth');
    Route ::post('shops', 'ShopController@store')->name('shops.store')->middleware('auth');
    Route ::get('shop/{shop_id}/home', 'ShopController@show')->name('shop.select');
    Route ::get('shops-list', 'ShopController@index')->name('shops.list')->middleware('auth');;
    Route ::get('shop-info/{shop_id}', 'ShopController@info')->name('shop.info')->middleware('auth');;
    Route ::post('/shop-info/{shop_id}', 'ShopController@update')->name('shop.update')->middleware('auth');
});

Route ::namespace('Web\Ajax') -> group(function () {
    Route ::get('/ajax/getdistrict', 'AjaxController@getDistrict') -> name('district.get');
    Route ::get('/ajax/getmunicipal', 'AjaxController@getMunicipal') -> name('municipal.get');
    Route ::get('/ajax/getward', 'AjaxController@getWard') -> name('ward.get');
    Route ::get('/information/select', 'AjaxController@select') -> name('information.select');
    Route ::post('/information', 'AjaxController@postInformation') -> name('information.post');

});

Route ::namespace('Web\Location') -> group(function () {
    //
});

Route ::namespace('Web\Purchase') -> group(function () {
    Route ::get('/cart', 'CartController@show') -> name('cart.show');
    Route ::post('/cart/{product_id}', 'CartController@store') -> name('cart.store');
    Route ::post('/cart/{cart_id}/{product_id}', 'CartController@update') -> name('cart.update');
    Route ::post('/cart/delete/{cart_id}/{product_id}', 'CartController@delete') -> name('cart.delete');
    Route ::get('/checkout/create', 'OrderController@create') -> name('order.create');
    Route ::post('/checkout', 'OrderController@store') -> name('order.store');
    Route ::get('/orders', 'OrderController@index') -> name('orders');
    Route ::get('/order/{order_id}', 'OrderController@show') -> name('order.show');
    Route ::get('/order-received/{cart_id}', 'OrderController@orderReceived') -> name('order.received');
    Route ::get('/order-confirmed/{cart_session_id}', 'OrderController@orderConfirmed') -> name('order.confirmed');

});


Route ::namespace('Web\Product') -> group(function () {
    Route ::get('/category/select', 'CategoryController@index') -> name('category.select');
    Route ::get('/product/create', 'ProductController@create')->name('product.create')->middleware('auth');;
    Route ::post('/products', 'ProductController@store')->name('products.store')->middleware('auth');;
    Route ::get('/products/{category_id}', 'ProductController@index')->name('products.select');
    Route ::get('/product/{product_id}', 'ProductController@show')->name('product.show');
    Route ::get('/products-listed', 'ProductController@productsListed')->name('products.listed');
    Route ::get('/product/{product_id}/edit', 'ProductController@edit')->name('product.edit')->middleware('auth');
    Route ::post('/product/{product_id}', 'ProductController@update')->name('product.update')->middleware('auth');
});

Route ::namespace('Web\Delivery') -> group(function () {
    Route ::get('/delivery/{order_id}', 'DeliveryController@show') -> name('delivery.detail');
});




