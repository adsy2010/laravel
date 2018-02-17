<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:18
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

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
}