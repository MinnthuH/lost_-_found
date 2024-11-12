<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verifytoken;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $get_user = User::where('email', auth()->user()->email)->first();

        if($get_user->is_activate == 1){
            return view('request-page');
        }else{
            return redirect('/verify-account');
        }
    }

    public function verifyaccount()
    {
        return view('opt_verification');
    }

    public function useractivication(Request $request)
    {
        $get_token = $request->token;
        $get_token = Verifytoken::where('token',$get_token)->first();

        if($get_token){
            $get_token->is_activated = 1;
            $get_token->save();
            $user = User::where('email',$get_token->email)->first();
            $user->is_activate = 1;
            $user->save();
            $getting_token = Verifytoken::where('token',$get_token->token)->first();
            $getting_token->delete();
            return redirect('/request-page')->with('activated','Your Account has been activated successfully');
        }else{
            return redirect('/verify-account')->with('incorrect','Your OTP is Invalid please check your email once');
        }
    }
}
