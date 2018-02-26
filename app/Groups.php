<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/02/2018
 * Time: 14:19
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $fillable = ['group_name', 'group_description'];

    public function members()
    {
        return $this->hasMany('App\Group_Members', 'group_id', 'id');
    }

    public function membersId()
    {
        return $this->hasMany('App\Group_Members', 'group_id', 'id')->select('member_id');
    }
}