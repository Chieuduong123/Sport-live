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
    Route::get('/login', 'Auth\UserController@getLogin')->name('login');
    Route::post('/login', 'Auth\UserController@postLogin')->name('login');
    Route::get('/logout', 'Auth\UserController@getLogout')->name('logout');
});


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('sport', 'SportController@index')->name('sports.index');
    Route::get('admin-sport', 'Admin\SportAdminController@index')->name('admin.sports.index');
    Route::get('manager-sport', 'Manager\SportManagerController@index')->name('manager.sports.index');
    Route::get('manager-add-sport', 'Manager\SportManagerController@store')->name('manager.sports.add');
    Route::post('manager-sports-create', 'Manager\SportManagerController@create')->name('manager-sports-create');
    Route::get('manager-edit-sport/{id}', 'Manager\SportManagerController@edit')->name('manager.sports.edit');
    Route::post('manager-sports-update/{id}', 'Manager\SportManagerController@update')->name('manager-sports-update');
    Route::post('/manager-deleteimage/{id}', 'Manager\SportManagerController@deleteImage');
    Route::get('manager-sport/{id}', 'Manager\SportManagerController@destroy')->name('manager.sports.destroy');
});
Route::get('sport-index', 'SportController@index')->name('sports.index');
Route::get('sports/{id}', 'SportController@showDetail')->name('detail');
