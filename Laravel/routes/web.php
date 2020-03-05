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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/province', 'location\ProvinceController@index')->name('province');
Route::get('/district', 'location\DistrictController@index')->name('district');
Route::get('/municipal', 'location\MunicipalController@index')->name('municipal');
Route::get('/localitydetail', 'location\LocalityController@create')->name('localitydetail');
Route::post('/localitydetail', 'location\LocalityController@store')->name('localitydetail.post');
Route::get('/locality', 'location\LocalityController@index')->name('locality');

