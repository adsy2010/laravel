<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21/02/2018
 * Time: 19:29
 */

namespace App\Http\Controllers;


use App\Blog;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    private function check()
    {
        if(!User::find(Auth::id())->admin)
            if(Auth::check())
                return redirect(Route('home'))
                    ->withErrors('Unable to access administrative features');
    }

    public function user(Request $request)
    {
        $this->check();
        $user = User::find($request['id']);
        return view('admin/user', ['user' => $user]);
    }

    public function index()
    {
        $this->check();
        $users = User::paginate(10);
        return view('admin/index', ['users' => $users]);
    }

    public function news()
    {
        $this->check();
        $news = News::paginate(10);
        return view('admin/news', ['news' => $news]);
    }

    public function blogs()
    {
        $this->check();
        $blogs = Blog::paginate(10);
        return view('admin/blogs', ['blogs' => $blogs]);
    }
}