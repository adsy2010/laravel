<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 04/02/2018
 * Time: 20:18
 */

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'subject', 'short_content', 'content', 'posted_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'posted_by');
    }

    public static function routes()
    {
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
        Route::post('/news/{id}',        'NewsController@article')->name('commentArticlePost');
    }
}