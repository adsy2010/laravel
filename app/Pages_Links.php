<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:22
 */

namespace App\Http;

/**
 * Class Pages_Links
 *
 * Passive filled class.
 * Class contents always relate to version of page.
 *
 * @package App\Http
 */
class Pages_Links
{
    protected $fillable = [
        'page_id', 'links_to', 'version'
    ];
}