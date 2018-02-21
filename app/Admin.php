<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21/02/2018
 * Time: 21:51
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user');
    }
}