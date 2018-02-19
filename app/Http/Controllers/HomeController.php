<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role_id == 1){
                
                //student home
                return view('studentHome')->with('user',$user);



            }elseif($user->role_id == 2){

                //instructor home
                return view('instructorHome')->with('user',$user);



            }elseif($user->role_id == 3){

                //admin dashboard
                return view('adminHome');
            }
        }else{
            return redirect('/');
        }
    }
}
