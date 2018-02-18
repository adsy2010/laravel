<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 29/01/2018
 * Time: 20:27
 */

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use App\Pages;
use App\PagesVersion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $this->middleware('auth');
        if(!Auth::check()) return redirect('/login');

        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect(url()->current())
                    ->withInput()
                    ->withErrors($validator);
            }

            $page = new Pages;
            $page->creator_user_id = Auth::id();
            $page->updater_user_id = Auth::id();
            $page->save();

            $pageVersion = new PagesVersion;
            $pageVersion->name = $request['id'];
            $pageVersion->page_id = $page->id;
            $pageVersion->content = $request['content'];
            $pageVersion->version = 1;
            $pageVersion->active = 1;
            $pageVersion->save();

            return redirect('/wiki/' . $request['id']);
        }
        return view('wiki/create', ['request' => $request]);
    }

    public function edit(Request $request)
    {
        $this->middleware('auth');

        if(!Auth::check()) return redirect('/login');


        $version = PagesVersion::where('name', $request['id'])
            ->orderBy('version', 'DESC')
            ->limit(1)
            ->get()[0];
        $page = Pages::find($version->page_id);


        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect(url()->current())
                    ->withInput()
                    ->withErrors($validator);
            }

            $page->save();

            $newversion = new PagesVersion;
            $newversion->page_id = $page->id;
            $newversion->active = 1;
            $newversion->name = $version->name;
            $newversion->updater_user_id = Auth::id();
            $newversion->content = $request['content'];
            $newversion->version = $version->version + 1;
            $newversion->save();

            return redirect(Route('showWikiPage', $version->name));
        }
        return view('wiki/edit', ['wiki' => $version]);
    }
}