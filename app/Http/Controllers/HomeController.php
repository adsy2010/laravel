<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //die(Auth::user()->admin);
        return view('home', array('news' => News::orderBy('created_at', 'DESC')->limit(3)->get()));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $this->middleware('auth');
        if(!Auth::check()) return redirect('login');
        $user = Auth::user();

        if($request->isMethod('post')){
            if($request->post('password') &&
                $request->post('confirm'))
            {
                $check = [
                    'name' => 'required|string|max:255',
                    'password' => 'required|string|min:6|same:confirm'
                ];
            }
            else
            {
                $check = [
                    'name' => 'required|string|max:255'
                ];
            }
            $validator = Validator::make($request->all(),$check);

            if ($validator->fails()) {
                return redirect('/profile')
                    ->withInput()
                    ->withErrors($validator);
            }

            /** @var User $updateUser */
            $updateUser = User::find(Auth::id());
            if(count($request['password']) > 0){
                Input::replace(['password' => bcrypt(Input::get('password'))]);
                $updateUser->fill(Input::only('name', 'password'))->save();
            }
            else
                $updateUser->fill(Input::only('name'))->save();
            return redirect('profile');

        }

        return view('profile', ['user' => $user]);
    }
}
