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

Route::name('index')->get('/', 'ExpenseController@index');
Route::name('store')->post('store', 'ExpenseController@store');
Route::name('edit')->get('edit/{expense}', 'ExpenseController@edit');
Route::name('update')->post('update/{expense}', 'ExpenseController@update');
Route::name('delete')->get('delete/{expense}', 'ExpenseController@delete');
