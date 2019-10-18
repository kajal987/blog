<?php

namespace App\Http\Controllers\Backend;

use App\Events\usercreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreate;
use App\User;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

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

    public function create(UserCreate $request) //JsonResponse
    {
        $input = $request->only(
            'name', 'email'
        );

        $password_string = $request->name . '@123';
        $input['password'] = Hash::make($password_string);
        $input['role']=0;
        if ($request->file('files')) {
            $avatar = $request->file('files')->store('public/users');
            $avatar_ex = explode('public/users/', $avatar);
            $input['image'] = $avatar_ex[1];
        }


        $user = User::create($input);

        //   @return Renderable

        Mail::send('emails.welcome', ['user' => $user], function ($message) {
            $message->from('us@example.com', 'Laravel');
            $message->to('kajalraychura@gmail.com')->cc('bar@example.com');
        });


        event(new usercreated($user));
        return response()->json(['status' => 'success', 'message' => "User added sucessfully", 'data' => ''], 200);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function showuser()
    {
        return view('backend/userview');
    }

    public function getDetails()   //@return Renderable
    {
        $users = DB::table('users')->where('role', 0)->get();
        return view("backend.user", ["userdetails" => $users]);
    }

    public function delete_user(Request $request)  //  return success or error
    {
        $user = User::findOrFail($request['delete_userid']);
        if ($user->delete()) {
            return response()->json(['status' => 'success', 'message' => "User deleted success.", 'data' => ''], 200);
        }
    }


    public function update(Request $request)  // Ajax call for Update User
    {

        $udata['email'] = $request['email'];
        $udata['name'] = $request['name'];
        $userid = $request['userid'];
        if ($request->file('files')) {
            $avatar = $request->file('files')->store('public/users');
            $avatar_ex = explode('public/users/', $avatar);
            $udata['image'] = $avatar_ex[1];

        }

        User::where('id', $userid)->update($udata);
        return response()->json(['status' => 'success', 'message' => "user update successfully", 'data' => $udata], 200);
    }

    public function userdashboard()
    {
        return view('userdashboard');
    }


}
