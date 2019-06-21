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

Route::get('admin_index', "AdminController@index_admin");

Route::get('admin_index/admin_users_edit/{user_id}', "AdminController@index_admin_edit");

Route::post('admin_index/admin_users_edit/{user_id}', "AdminController@updateUser");

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addsboys', 'SboysController@ajaxRequest')->name('addsboys');

Route::post('/addsboys', 'SboysController@ajaxRequestPost');

