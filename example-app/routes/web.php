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

// 初期表示
Route::get('/', 'PostController@index')->name('index');

// 新規登録
Route::post('/', 'PostController@create')->name('create');

// 更新
Route::put('/', 'PostController@update')->name('update');

// 削除
Route::delete('/', 'PostController@destroy')->name('destroy');