<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24/01/2018
 * Time: 22:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'subject',
        'content',
        'owner'
    ];
}