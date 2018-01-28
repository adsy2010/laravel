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
        'creator_user_id', 'updater_user_id', 'active'
    ];
}