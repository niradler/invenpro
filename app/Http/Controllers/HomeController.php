<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Inventory;
use Validator;
use Auth;

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
     $inventory = \DB::table('inventories')
    ->select('inventories.*', 'users.name as user')
    ->where('share',1)
    ->orderBy('updated_at' , 'dsec')
    ->join('users', 'users.id', '=', 'inventories.user_id')
    ->get();
        return view('home',compact('inventory'));
    }
}
