<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:23
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create(Request $request)
    {
        return view('wiki/create', ['request' => $request]);
    }

    public function view(Request $request)
    {
        return view('wiki/view', ['request' => $request]);
    }

    public function edit(Request $request)
    {
        return view('wiki/edit', ['request' => $request]);
    }

    public function delete(Request $request)
    {
        return view('wiki/delete', ['request' => $request]);
    }

    public function history(Request $request)
    {
        return view('wiki/history', ['request' => $request]);
    }

    public function search(Request $request)
    {
        return view('wiki/search', ['request' => $request]);
    }

    public function admin(Request $request)
    {
        return view('wiki/admin', ['request' => $request]);
    }

}