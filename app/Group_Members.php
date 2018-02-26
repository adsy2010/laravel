<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/02/2018
 * Time: 14:19
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Group_Members extends Model
{
    protected $table = 'group_members';
    protected $fillable = ['group_id', 'member_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'member_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Groups', 'group_id');
    }
}