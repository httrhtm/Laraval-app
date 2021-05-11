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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list', 'ListController@index')->name('list');

Route::get('/register/create', 'RegisterController@create')->name('register.create');
Route::post('/register/confirm', 'RegisterController@confirm')->name('register.confirm');
Route::post('/register/store', 'RegisterController@store')->name('register.store');

Route::post('/delete/confirm', 'DeleteController@confirm')->name('delete.confirm');
Route::post('/delete/destroy', 'DeleteController@destroy')->name('delete.destroy');

Route::get('/edit/edit', 'EditController@edit')->name('edit.edit');
Route::post('/edit/edit', 'EditController@edit')->name('edit.edit');
Route::post('/edit/confirm', 'EditController@confirm')->name('edit.confirm');
Route::post('/edit/update', 'EditController@update')->name('edit.update');

Route::get('/test/test', 'TestController@test')->name('test.test');
Route::get('/test/result', 'TestController@result')->name('test.result');