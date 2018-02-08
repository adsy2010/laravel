<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24/01/2018
 * Time: 23:01
 */

namespace App\Http\Controllers;


use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    // TODO: Add breadcrumbs to all blog views

    /**
     * BlogController constructor.
     *
     * Requires a user to be logged in for all aspects
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View all posts, newest first
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Route::current()->getName() == 'usersBlogs')
            $blogs = Blog::where('user_id', '=', $request['id'])->orderBy('created_at', 'desc')->get();
        else
            $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('blog/blog', ['blogs' => $blogs]);
    }


    public function view($id)
    {
        if(!($blog = Blog::find($id)))
            return redirect('blog')->withErrors('Post not found');
        $user = User::find($blog->user_id);
        return view('blog/view', ['blog' => $blog, 'user' => $user]);
    }
}