<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 04/02/2018
 * Time: 20:18
 */

namespace App;


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
}