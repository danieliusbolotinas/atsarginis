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

Route::get('/', 'CharacterController@index')->name('index'); //nereikia blade rasyti pilno linko//
Route::get('/create', 'CharacterController@create')->name('create');
Route::post('/store', 'CharacterController@store')->name('store');
