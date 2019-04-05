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
    return view('welcome');
});


//routes for the Api
Route::Resource('/api/calc/datum','CalculationController'); 

//routes for the register and login pages
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
