<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 07/02/2018
 * Time: 19:53
 */

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'subject' => 'required|max:128',
                'short_content' => 'required|max:1000',
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/news/create')
                    ->withInput()
                    ->withErrors($validator);
            }

            $news = new News;
            $news->posted_by = Auth::id();
            $news->subject = $request['subject'];
            $news->short_content = $request['short_content'];
            $news->content = $request['content'];
            $news->save();

            return redirect('news/'.$news->id);
        }

        return view('news/create');
    }

    public function edit()
    {
        return view('news/create');
    }
}