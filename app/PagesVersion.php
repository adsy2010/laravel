<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:21
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class PagesVersion extends Model
{
    protected $table = "pages_version";

    protected $fillable = [
        'page_id', 'name', 'content', 'version', 'active'
    ];
}