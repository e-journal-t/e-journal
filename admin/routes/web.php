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

//Admin
Route::get('admin_index/admin_users_edit/{user_id}/update', "AdminController@index_admin_edit");
Route::get('admin_index/admin_users_edit/{user_id}/add_sboy', "AdminController@index_admin_edit");
Route::get('admin_index/admin_users_edit/{user_id}/delete', "AdminController@index_admin_edit");
Route::post('admin_index/admin_users_edit/{user_id}/update', "AdminController@updateUser");
Route::post('admin_index/admin_users_edit/{user_id}/add_sboy', "AdminController@addSboys");
Route::post('admin_index/admin_users_edit/{user_id}/delete', "AdminController@deleteSboys");
Route::post('/admin_index/nav-new-users', 'AdminController@addUser');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addsboys', 'SboysController@ajaxRequest')->name('addsboys');

Route::post('/addsboys', 'SboysController@ajaxRequestPost');


//Rating
Route::get('home/rating', "UserRatingController@renderUserRating");
Route::post('home/rating', "UserRatingController@GetSboys");
Route::get('home/rating/search', "UserRatingController@renderUserRating");
Route::post('home/rating/search', "UserRatingController@getRatings");

//User settings
Route::get('home/settings', "UserRatingController@renderUserSettings");
