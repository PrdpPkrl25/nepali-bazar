<?php

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

Route ::get('/admin', 'User\UserController@Welcome')->name('admin');

Route::get('/',function (){
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route ::namespace('Vendor') -> group(function () {
    Route ::get('shops/{product_id}', 'ShopController@index')->name('shops.select');
});

Route::namespace('User') ->group(function (){
    Route::resource('users','UserController');
});

Route::get('/roles', 'PermissionController@Permission');

Route ::namespace('Web\Location') -> group(function () {
    Route ::get('/selectprovince', 'ProvinceController@allProvince') -> name('province.start');
    Route ::post('/selectdistrict', 'DistrictController@allDistrict') -> name('district.start');
    Route ::post('/selectmunicipal', 'MunicipalController@allMunicipal') -> name('municipal.start');
    Route ::post('/selectward', 'WardController@allWard') -> name('ward.start');
    Route ::post('/selectlocality', 'LocalityController@allLocality') -> name('locality.start');
});

Route ::namespace('Web\Product') -> group(function () {
    Route ::get('/products/create', 'ProductController@create')->name('products.create');
    Route ::post('/products', 'ProductController@store')->name('products.store');
    Route ::get('/products/{category_id}', 'ProductController@index')->name('products.select');

});

Route ::namespace('Web\Product') -> group(function () {
    Route ::post('/selectcategory', 'CategoryController@index') -> name('category.select');
});


