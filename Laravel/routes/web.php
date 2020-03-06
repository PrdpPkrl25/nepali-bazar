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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shops', 'Vendor\ShopController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/province', 'location\ProvinceController@index')->name('province');
Route::get('/district', 'location\DistrictController@index')->name('district');
Route::get('/municipal', 'location\MunicipalController@index')->name('municipal');
Route::get('/locality', 'location\LocalityController@index')->name('locality');
Route::get('/localitydetail', 'location\LocalityController@create')->name('localitydetail');
Route::post('/localitydetail', 'location\LocalityController@store')->name('localitydetail.post');
Route::get('/localityedit/{id}', 'location\LocalityController@edit')->name('localityedit');
Route::post('/localityupdate/{id}', 'location\LocalityController@update')->name('localityedit.post');
Route::get('/localitydelete/{id}', 'location\LocalityController@destroy')->name('localitydelete');


