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


Route::group(['middleware' => 'web'], function () {
    Route::get('/register', 'Auth\UserController@getRegister')->name('register');
    Route::post('/register', 'Auth\UserController@postRegister')->name('register');
    Route::get('login', [
        'as' => 'login',
        'uses' => 'Auth\UserController@getLogin'
    ]);
    Route::post('/login', [
        'uses' => 'Auth\UserController@postLogin',
        'as' => 'login'
    ]);
});


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('sport', 'SportController@index')->name('sports.index');
    Route::get('sport/{id}', 'SportController@destroy')->name('sports.destroy');
    Route::get('add-sport', 'SportController@store')->name('sports.add');
    Route::post('sports-create', 'SportController@create');
    Route::get('edit-sport/{id}', 'SportController@edit')->name('sports.edit');
    Route::post('sports-update/{id}', 'SportController@update');
    Route::post('/deleteimage/{id}','SportController@deleteImage');
    Route::get('sports/{id}', 'SportController@showDetail')->name('detail');
});
