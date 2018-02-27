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

Route::get('/!/admin',          'AdminController@index')->name('adminHome');
Route::get('/!/admin/news',     'AdminController@news')->name('adminNews');

Route::get('/!/admin/groups',                   'Admin\GroupsController@groups')->name('adminGroupsList');
Route::get('/!/admin/groups/create',            'Admin\GroupsController@create')->name('adminGroupsCreate');
Route::get('/!/admin/groups/{id}',              'Admin\GroupsController@group')->name('adminGroupsView');
Route::get('/!/admin/groups/{id}/addmember',    'Admin\GroupsController@addmember')->name('adminGroupsAddmember');
Route::get('/!/admin/groups/{id}/edit',         'Admin\GroupsController@edit')->name('adminGroupsEdit');
Route::get('/!/admin/groups/{id}/delete',       'Admin\GroupsController@delete')->name('adminGroupsDelete');

Route::get('/!/admin/blogs',    'AdminController@blogs')->name('adminBlogs');
Route::get('/!/admin/user/{id}', 'AdminController@user')->name('adminUserEdit');

Route::post('/!/admin/groups/create',            'Admin\GroupsController@create')->name('adminGroupsPostCreate');
Route::post('/!/admin/groups/{id}/addmember',    'Admin\GroupsController@addmember')->name('adminGroupsPostAddmember');
Route::post('/!/admin/groups/{id}/edit',         'Admin\GroupsController@edit')->name('adminGroupsEdit');
Route::post('/!/admin/groups/{id}/delete',       'Admin\GroupsController@delete')->name('adminGroupsPostDelete');
Route::post('/!/admin/groups/{id}',              'Admin\GroupsController@removemember')->name('adminGroupsPostRemoveMember');

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profile')->name('profile');


App\Blog::routes();
App\News::routes();
App\Pages::routes();