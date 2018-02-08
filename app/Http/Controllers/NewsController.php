<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 04/02/2018
 * Time: 20:18
 */

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $articles = News::orderBy('created_at', 'desc')->get();
        return view('news/list', array('articles' => $articles));
    }

    public function article($id)
    {
        $article = News::findOrFail($id);
        $user = User::findOrFail($article['posted_by']);
        return view('news/article', array('article' => $article, 'user' => $user));
    }

    public function delete()
    {
        // TODO: Complete delete news article method, move to own controller
        return view('news/delete');
    }
}