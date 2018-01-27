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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profile')->name('profile');


Route::get('/blog', 'BlogController@index')->name('blog'); //list
Route::get('/blog/create', 'BlogController@create')->name('postblog');
Route::get('/blog/edit/{id}', 'BlogController@edit')->name('editblog');
Route::post('/blog/edit/{id}', 'BlogController@edit')->name('editBlogPost');
Route::get('/blog/delete/{id}', 'BlogController@delete')->name('deleteblog');
Route::get('/blog/{id}', 'BlogController@view')->name('viewblog');

Route::post('/blog/create', 'BlogController@createPost')->name('createBlogPost');
Route::post('/blog/delete/{id}', 'BlogController@delete')->name('deleteBlogPost');
