<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 14:49
 */
class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Manage deletion control for a blog post
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function delete(Request $request)
    {
        if(isset($request['cancel'])) return redirect("blog/{$request['id']}");
        if(!($blog = Blog::find($request['id'])))
            return redirect('blog')->withErrors('Post does not exist');

        if($blog->user_id != Auth::id())
            return redirect('blog')->withErrors('Unable to delete post not owned by current user');

        if(isset($request['delete'])) {
            Blog::destroy($request['id']);
            return redirect('blog');
        }


        return view('blog/delete', ['blog' => $blog]);
    }

    public function deletePost(Request $request)
    {
        return view('blog/delete');
    }
}