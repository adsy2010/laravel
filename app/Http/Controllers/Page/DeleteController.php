<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 29/01/2018
 * Time: 20:28
 */

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\PagesVersion;
use Illuminate\Support\Facades\Request;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete(Request $request)
    {
        $this->middleware('auth');
        $wiki = PagesVersion::where('name', $request['id'])
            ->orderBy('version', 'DESC')
            ->limit(1)
            ->get()[0];
        return view('wiki/delete', ['request' => $request, 'wiki' => $wiki]);
    }
}