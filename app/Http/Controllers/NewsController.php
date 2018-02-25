<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 04/02/2018
 * Time: 20:18
 */

namespace App\Http\Controllers;

use App\Comments;
use App\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $articles = News::orderBy('created_at', 'desc')->get();
        return view('news/list', array('articles' => $articles));
    }

    public function article(Request $request)
    {
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect(Route('newsArticle', ['id' => $request['id']]))
                    ->withInput()
                    ->withErrors($validator);
            }

            $comment = new Comments;
            $comment->user = Auth::id();
            $comment->post = $request['id'];
            $comment->postTable = 'news';
            $comment->content = $request['content'];
            $comment->save();

            return redirect(Route('newsArticle', ['id' => $request['id']]));
        }

        $article = News::findOrFail($request['id']);
        $comments = Comments::where([['postTable', '=', 'news'], ['post', '=', $request['id']]])->paginate(10);
        return view('news/article', array('article' => $article, 'comments' => $comments));

    }

    public function delete()
    {
        // TODO: Complete delete news article method, move to own controller
        return view('news/delete');
    }
}