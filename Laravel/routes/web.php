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
Route::get('/provinces', 'Location\ProvinceController@index')->name('provinces');
Route::get('/districts', 'Location\DistrictController@index')->name('districts');
Route::get('/municipal', 'Location\MunicipalController@index')->name('municipal');
Route::get('/locality', 'Location\LocalityController@index')->name('locality');

