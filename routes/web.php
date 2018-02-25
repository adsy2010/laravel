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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/!/admin', 'AdminController@index')->name('adminHome');
Route::get('/!/admin/news', 'AdminController@news')->name('adminNews');
Route::get('/!/admin/blogs', 'AdminController@blogs')->name('adminBlogs');
Route::get('/!/admin/user/{id}', 'AdminController@user')->name('adminUserEdit');

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profile')->name('profile');


App\Blog::routes();
App\News::routes();
App\Pages::routes();