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

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profile')->name('profile');


/** Blog page redirections */
Route::get('/blog/user', function(){ return redirect('/blog'); });
Route::get('/blog/edit', function(){ return redirect('/blog'); });
Route::get('/blog/delete', function(){ return redirect('/blog'); });

/** Main blog routes */
Route::get('/blog',              'BlogController@index')->name('blog'); //list
Route::get('/blog/create',       'Blog\PostController@create')->name('postblog');
Route::get('/blog/user/{id}',    'BlogController@index')->name('usersBlogs');
Route::get('/blog/{id}',         'BlogController@view')->name('viewblog');
Route::get('/blog/{id}/edit',    'Blog\PostController@edit')->name('editblog');
Route::get('/blog/{id}/delete',  'Blog\DeleteController@delete')->name('deleteblog');

/** Blog post routes */
Route::post('/blog/create',      'Blog\PostController@createPost')->name('createBlogPost');
Route::post('/blog/edit/{id}',   'Blog\PostController@edit')->name('editBlogPost');
Route::post('/blog/delete/{id}', 'Blog\DeleteController@delete')->name('deleteBlogPost');

/** News page redirections */
/** None at this time */

/** Main news routes */
Route::get('/news',             'NewsController@index')->name('listNews');
Route::get('/news/create',      'News\PostController@create')->name('createNews');
Route::get('/news/{id}',        'NewsController@article')->name('newsArticle');
Route::get('/news/{id}/edit',   'News\PostController@edit')->name('editNews');
Route::get('/news/{id}/delete', 'NewsController@delete')->name('deleteNews');

/** News post routes */
Route::post('/news/create',      'News\PostController@create')->name('postCreateNews');

/** Special wiki routes */
Route::get('/wiki/!/search',    'PageController@search')->name('searchWikiPage');
Route::get('/wiki/!/my',        'PageController@my')->name('myWikiPage');
Route::get('/wiki/!/recent',    'PageController@recent')->name('recentWikiPage');
Route::get('/wiki/!/admin',     'PageController@admin')->name('adminWikiPage');

/** Main wiki woutes */
Route::get('/wiki',              'PageController@view')->name('showInitialWikiPage');
Route::get('/wiki/{id}',         'PageController@view')->name('showWikiPage');
Route::get('/wiki/{id}/create',  'Page\PostController@create')->name('createWikiPage');
Route::get('/wiki/{id}/edit',    'Page\PostController@edit')->name('editWikiPage');
Route::get('/wiki/{id}/delete',  'Page\DeleteController@delete')->name('deleteWikiPage');
Route::get('/wiki/{id}/history', 'PageController@history')->name('historyWikiPage');
Route::get('/wiki/{id}/history/{version}', 'PageController@version')->name('historicVersionWikiPage');

/** Wiki post routes */
Route::post('/wiki/{id}/create', 'Page\PostController@create')->name('createWikiPagePost');
Route::post('/wiki/{id}/edit', 'Page\PostController@edit')->name('editWikiPagePost');