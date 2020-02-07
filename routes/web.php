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

Route::get('/', [
    'uses' => 'CustomerController@index',  
]);

Route::post('/customer-save', [
    'uses' => 'CustomerController@save',  
]);

Route::get('/customer-list', [
    'uses' => 'CustomerController@customerList',  
]);

Route::get('/customer-edit/{id}', [
    'uses' => 'CustomerController@edit',  
]);

Route::post('/customer-update/{id}', [
    'uses' => 'CustomerController@update',  
]);

Route::post('/customer-delete/{id}', [
    'uses' => 'CustomerController@delete',  
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
