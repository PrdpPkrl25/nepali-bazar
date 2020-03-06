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

Route ::get('/', function () {
    return view('welcome');
});


Auth ::routes();
Route ::get('/home', 'HomeController@index') -> name('home');

Route ::namespace('Vendor') -> group(function () {
    Route ::resource('shops', 'ShopController');
});



Route ::namespace('Location') -> group(function () {
    Route ::get('/province', 'ProvinceController@index') -> name('province');
    Route ::get('/district', 'DistrictController@index') -> name('district');
    Route ::get('/municipal', 'MunicipalController@index') -> name('municipal');
    Route ::get('/locality', 'LocalityController@index') -> name('locality');
    Route ::get('/localitydetail', 'LocalityController@create') -> name('localitydetail');
    Route ::post('/localitydetail', 'LocalityController@store') -> name('localitydetail.post');
    Route ::get('/localityedit/{id}', 'LocalityController@edit') -> name('localityedit');
    Route ::post('/localityupdate/{id}', 'LocalityController@update') -> name('localityedit.post');
    Route ::get('/localitydelete/{id}', 'LocalityController@destroy') -> name('localitydelete');
    Route::resource('ward', 'WardController');
});






