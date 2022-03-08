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

Route::get('/', 'ItemController@index')->name('index');
Route::get('/create', 'ItemController@create')->name('create')->middleware('auth');
Route::post('/', 'ItemController@store')->name('store')->middleware('auth');
Route::get('{item}/edit', 'ItemController@edit')->name('edit')->middleware('auth');
Route::put('{item}', 'ItemController@update')->name('update')->middleware('auth');
Route::delete('{item}', 'ItemController@destroy')->name('destroy')->middleware('auth');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
