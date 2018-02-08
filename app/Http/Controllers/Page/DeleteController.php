<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 29/01/2018
 * Time: 20:28
 */

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}