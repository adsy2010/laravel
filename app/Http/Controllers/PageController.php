<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:23
 */

namespace App\Http\Controllers;


use App\Pages;
use App\PagesVersion;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create(Request $request)
    {
        return view('wiki/create', ['request' => $request]);
    }

    /**
     * Display the latest active version of a page or redirect to create the page
     *
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function view(Request $request)
    {
        //Return wiki homepage if no id exists
        if(!$request['id'])
        {
            $page = PagesVersion::where(['name' => 'home_page', 'active' => 1])
                ->orderBy('version', 'desc')
                ->first();
            return (sizeof($page) > 0) ?  redirect('wiki/home_page') : redirect('/wiki/home_page/create')->withErrors('There is currently no wiki homepage defined.');

        }
        $page = PagesVersion::where(['name' => $request['id'], 'active' => 1])
                ->orderBy('version', 'desc')
                ->first();
        //display any page if an id is specified
        return (count($page) > 0) ? view('wiki/view', ['page' => $page]) : redirect("/wiki/{$request['id']}/create")->withErrors('This page has not been created yet.');
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