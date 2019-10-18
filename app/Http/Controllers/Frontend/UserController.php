<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
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

    public function index()
    {

        return view('frontend.userdashboard');
    }

    public function profile()
    {  //Load User profile page
        return view('frontend.profileview');
    }

    public function updateprofile(Request $request)
    {    // this function used to update user information
        $udata['name'] = $request['name'];
        $udata['email'] = $request['email'];
        $uid = $request['userid'];
        if (User::where('id', $uid)->update($udata)) {
            return response()->json(['status' => 'success', 'message' => "User update success.", 'data' => $request['name']], 200);
        }
    }


}
