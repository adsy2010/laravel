<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:18
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Pages extends Model
{
    protected $table = "pages";

    protected $fillable = [
        'creator_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function pagesversion()
    {
        return $this->hasMany('App\PagesVersion', 'page_id', 'id');
    }

    public function latest()
    {
        return $this->hasOne('App\PagesVersion', 'page_id', 'id')->latest()->first();
    }

    public static function routes()
    {
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
    }
}