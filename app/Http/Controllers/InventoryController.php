<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\Inventory;
use Validator;

class InventoryController extends Controller
{
           /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory');
    }

            public function show($id)
    {
         $inventory = Inventory::where('share',1)->findOrFail($id);
       $items=Item::where('inventory_id',$inventory->id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('inventory' , compact('inventory','items'));
    }
}
