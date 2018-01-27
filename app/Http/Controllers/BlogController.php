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
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

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
     * View all posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'asc')->get();
        return view('blog/blog', ['blogs' => $blogs]);
    }


    public function create()
    {
        return view('blog/create');
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject' => 'required|max:128',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/blog/create')
                ->withInput()
                ->withErrors($validator);
        }

        $blog = new Blog;
        $blog->user_id = Auth::id();
        $blog->subject = $request['subject'];
        $blog->content = $request['content'];
        $blog->save();

        return redirect('blog/'.$blog->id);
    }

    public function edit($id)
    {
        if(!($blog = Blog::find($id)))
            return $this->index();

        return view('blog/edit', ['blog' => $blog]);
    }
    public function delete(Request $request)
    {
        if(isset($request['cancel'])) return redirect("blog/{$request['id']}");
        if(isset($request['delete'])) {
            Blog::destroy($request['id']);
            return redirect('blog');
        }

        if(!($blog = Blog::find($request['id'])))
            return $this->index();
        return view('blog/delete', ['blog' => $blog]);
    }

    public function deletePost(Request $request)
    {

        return view('blog/delete');
    }

    public function view($id)
    {
        $blog = Blog::find($id);
        $user = User::find($blog->user_id);
        return view('blog/view', ['blog' => $blog, 'user' => $user]);
    }
}