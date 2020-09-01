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
    Route ::get('shop/create', 'ShopController@create')->name('shop.create');
    Route ::post('shops', 'ShopController@store')->name('shops.store');
    Route ::get('shop/{shop_id}', 'ShopController@show')->name('shop.select');
    Route ::get('shop-account', 'ShopController@info')->name('shop.profile');
});

Route ::namespace('Web\Ajax') -> group(function () {
    Route ::get('/ajax/getdistrict', 'AjaxController@getDistrict') -> name('district.get');
    Route ::get('/ajax/getmunicipal', 'AjaxController@getMunicipal') -> name('municipal.get');
    Route ::get('/ajax/getward', 'AjaxController@getWard') -> name('ward.get');
    Route ::post('/ajax/postlocation', 'AjaxController@postLocation') -> name('location.post');
});

Route ::namespace('Web\Location') -> group(function () {
    Route ::get('/location/select', 'LocationController@select') -> name('location.select');
    Route ::post('/location', 'LocationController@store') -> name('location.store');
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
    Route ::get('/order-received', 'OrderController@orderReceived') -> name('order.received');
    Route ::get('/order-confirmed/{cart_session_id}', 'OrderController@orderConfirmed') -> name('order.confirmed');

});


Route ::namespace('Web\Product') -> group(function () {
    Route ::get('/category/select', 'CategoryController@index') -> name('category.select');
    Route ::get('/product/create', 'ProductController@create')->name('product.create');
    Route ::post('/products', 'ProductController@store')->name('products.store');
    Route ::get('/products/{category_id}', 'ProductController@index')->name('products.select');
    Route ::get('/product/{product_id}', 'ProductController@show')->name('product.show');
    Route ::get('/products-listed', 'ProductController@productsListed')->name('products.listed');
    Route ::get('/product/{product_id}/edit', 'ProductController@edit')->name('product.edit');
    Route ::post('/product/{product_id}', 'ProductController@update')->name('product.update');


});




