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

Route::get('/test', 'SportController@test');

Route::get('sport', 'SportController@index')->name('sports.index');
Route::get('sport/{id}', 'SportController@destroy')->name('sports.destroy');

Route::get('add-sport', 'SportController@store')->name('sports.add');
Route::post('sports-create', 'SportController@create');
Route::get('edit-sport/{id}', 'SportController@edit')->name('sports.edit');
Route::post('sports-update/{id}', 'SportController@update');
Route::get('sports/{id}', 'SportController@showDetail')->name('detail');
