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
}