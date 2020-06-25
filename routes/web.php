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

Route::get('/', 'MainController@index');
Route::get('/currencyWidget', 'Widgets\CurrencyWidgetController@getCurrency');
Route::get('/searchingWidget', 'Widgets\SearchWidgetController@getListSearching');

Route::get('searching', 'SearchingController@getResultSearch');


Route::resource('currency', 'CurrencyController');
Route::resource('category', 'CategoryController');
Route::resource('mobile', 'MobileController');
Route::resource('Television', 'TelevisionController');
Route::resource('Computer', 'ComputerController');
Route::resource('large_technical', 'ComputerController');

Route::resource('people', 'PeopleController');


