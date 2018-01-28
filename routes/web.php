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
Route::get('/blog/{id}', 'BlogController@view')->name('viewblog');
Route::get('/blog/create', 'BlogController@create')->name('postblog');
Route::get('/blog/edit/{id}', 'BlogController@edit')->name('editblog');
Route::get('/blog/delete/{id}', 'BlogController@delete')->name('deleteblog');

Route::post('/blog/create', 'BlogController@createPost')->name('createBlogPost');
Route::post('/blog/edit/{id}', 'BlogController@edit')->name('editBlogPost');
Route::post('/blog/delete/{id}', 'BlogController@delete')->name('deleteBlogPost');


Route::get('/wiki/tools/search', 'PageController@search')->name('searchWikiPage');
Route::get('/wiki/tools/admin', 'PageController@admin')->name('adminWikiPage');
Route::get('/wiki/{id}', 'PageController@view')->name('showWikiPage');
Route::get('/wiki/{id}/create', 'PageController@create')->name('createWikiPage');
Route::get('/wiki/{id}/edit', 'PageController@edit')->name('editWikiPage');
Route::get('/wiki/{id}/delete', 'PageController@delete')->name('deleteWikiPage');
Route::get('/wiki/{id}/history', 'PageController@history')->name('historyWikiPage');
