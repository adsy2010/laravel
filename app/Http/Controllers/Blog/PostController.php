<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 20:41
 */

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the create blog page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Perform the creation of a blog post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Perform edit function and display for a blog post
     *
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        if(!($blog = Blog::find($request['id'])))
            return redirect('blog')->withErrors('Post not found');
        if($blog->user_id != Auth::id())
            return redirect('blog')->withErrors(['Illegal Access - Access to edit a post was restricted.']);

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'subject' => 'required|max:128',
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect(url()->current())
                    ->withInput()
                    ->withErrors($validator);
            }
            $blog->fill(Input::only('subject', 'content'))->save();
            return redirect(url('/blog/'.$blog->id));
        }

        return view('blog/edit', ['blog' => $blog]);
    }
}