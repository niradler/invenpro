<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Inventory;
use App\Item;
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
    public function index(Request $request)
    {
        $order='dsec';
         $sortby ='updated_at';
        if($request->sort){
            $sortby=$request->sort;
        }
        if($request->order){
           $order=$request->order;
        }
     $inventory = \DB::table('inventories')
    ->select('inventories.*', 'users.name as user')
    ->where('share',1)
    ->orderBy($sortby , $order)
    ->join('users', 'users.id', '=', 'inventories.user_id')
    ->paginate(10);
        return view('home',compact('inventory'));
    }
    public function search(Request $request)
    {
        $res =  $request->input('query');
         $user_id = Auth::user()->id;
        $items = \DB::table('inventories')
    ->select('inventories.*', 'items.*')
    ->where('inventories.user_id',$user_id)
    ->where('items.name', 'LIKE', '%'.$res .'%')
    ->take(20)
    ->join('items', 'items.inventory_id', '=', 'inventories.id')
    ->paginate(10);  
        
        return view('inventory',compact('items'));
    }
}
