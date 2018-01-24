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

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'asc')->get();
        return view('blog/blog', ['blogs' => $blogs]);
    }

    public function view($id)
    {
        $blog = Blog::find($id);
        $user = User::find($blog->user_id);
        return view('blog/view', ['blog' => $blog, 'user' => $user]);
    }
}