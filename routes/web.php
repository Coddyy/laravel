<?php

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
    //return view('welcome');
    return "Hello";
});
Route::get('hello','MyController@index');
Route::post('submit','MyController@submit');
//Route::get('form','MyController@form');

Route::get('form', 'FormController@index')->name('Form');

Route::post('FormInsert', 'FormController@insert')->name('FormInsert');



// Project Routes

Route::get('home', 'MainController@index')->name('home');
Route::get('add', 'MainController@add_car_repair')->name('add');
Route::post('Insert', 'MainController@insert_car_repair')->name('Insert');

// End Project Routes
