<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24/02/2018
 * Time: 15:02
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['post', 'user', 'postTable', 'content'];

    public function userDetail()
    {
        return $this->belongsTo('App\User', 'user');
    }
}