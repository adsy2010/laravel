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

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
    {
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

        if (!(sizeof($page) > 0)) return redirect(url()->current().'/create')->withErrors('This page currently is not defined.');

        $pageDetails = Pages::find($page->page_id);

        //display any page if an id is specified
        return (count($page) > 0) ? view('wiki/view',
            ['page' => $page,
                'pageDetails' => $pageDetails,
                'creator' => User::find($pageDetails->creator_user_id),
                'updater' => User::find($page->updater_user_id)
            ]) : redirect("/wiki/{$request['id']}/create")->withErrors('This page has not been created yet.');
    }

    public function my(Request $request)
    {
        $versions = Pages::where('creator_user_id', Auth::id())->get();

        return view('wiki/my', ['page' => $versions]);
    }

    public function history(Request $request)
    {
        $this->middleware('auth');

        if(!$versions = PagesVersion::where('name', $request['id'])
            ->orderBy('version', 'desc')
            ->get()
        ) return redirect()->route('showInitialWikiPage');

        return view('wiki/history', ['wikiVersions' => $versions, 'request' => $request]);
    }

    public function search(Request $request)
    {
        return view('wiki/search', ['request' => $request]);
    }

    public function admin(Request $request)
    {
        $this->middleware('auth');
        return view('wiki/admin/admin', ['request' => $request]);
    }

}