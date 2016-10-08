<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\User;
use Auth;

class ProfileController extends Controller
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
         $user = Auth::user();
        return view('profile',compact('user'));
    }
      public function reset()
    {
        Auth::logout();
        return redirect('/password/reset');
    }
      public function update(Request $request)
    {
         $user_id = Auth::user()->id;
         $user = User::find($user_id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();
        return view('profile',compact('user'));
    }
}
