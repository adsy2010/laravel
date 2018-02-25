<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24/01/2018
 * Time: 22:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;

class Blog extends Model
{
    use Notifiable;
    public $timestamps = true;

    protected $fillable = [
        'subject',
        'content',
        'owner'
    ];

    public function usesTimestamps()
    {
        return $this->timestamps;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /** Routes */
    public static function routes()
    {
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
        Route::post('/blog/{id}',        'BlogController@view')->name('commentBlogPost');
        Route::post('/blog/edit/{id}',   'Blog\PostController@edit')->name('editBlogPost');
        Route::post('/blog/delete/{id}', 'Blog\DeleteController@delete')->name('deleteBlogPost');
    }
}