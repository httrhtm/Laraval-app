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
    return redirect()->route('login');
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
Route::post('/test/result', 'TestController@result')->name('test.result');

Route::get('/history', 'HistoryController@index')->name('history');

Route::get('/user/list', 'User\ListController@index')->name('user.list');

Route::get('/user/register/create', 'User\RegisterController@create')->name('user.register.create');
Route::post('/user/register/confirm', 'User\RegisterController@confirm')->name('user.register.confirm');
Route::post('/user/register/store', 'User\RegisterController@store')->name('user.register.store');

Route::post('/user/delete/confirm', 'User\DeleteController@confirm')->name('user.delete.confirm');
Route::post('/user/delete/destroy', 'User\DeleteController@destroy')->name('user.delete.destroy');
