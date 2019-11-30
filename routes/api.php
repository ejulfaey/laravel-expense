<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->group(function(){
    Route::get('list', 'ExpenseController@list');
    Route::post('store', 'ExpenseController@store');
    Route::get('view/{expense}', 'ExpenseController@view');
    Route::put('update/{expense}', 'ExpenseController@update');
    Route::delete('delete/{expense}', 'ExpenseController@delete');
});
