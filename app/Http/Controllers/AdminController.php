<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
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
    public function showuser():  Renderable
    {
        return view('userview');
    }

    public function getDetails(){	// Ajax call for get user record
        $users = User::get();
        return view("user", ["userdetails"=>$users]);
        return response()->json(['status'=>'success','message' =>"User success.",'data'=>$users], 200);
    }
}
