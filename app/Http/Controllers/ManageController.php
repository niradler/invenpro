<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\Inventory;
use Validator;
use Auth;

class ManageController extends Controller
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
             $user_id = Auth::user()->id;
        $inventory = Inventory::where('user_id',$user_id)->orderBy('id', 'desc')->get();
        return view('manage' , compact('inventory'));
    }
        public function show($id)
    {
         $inventory = Inventory::findOrFail($id);
         if($inventory->user_id != Auth::user()->id)
         {
         return view('home');
        }
        $items= $inventory->items;
        return view('manageOne' , compact('inventory','items'));
    }
        public function remove($id,$item_id)
    {
        $item = Item::findOrFail($item_id);
        $item->destroy($item_id);
        return redirect('/manage/'.$id);
    }
        public function save($id,Request $request)
    {
  $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
         ]);

         if ($validator->fails()) {
             return
             redirect('manage')
                 ->withInput()
                 ->withErrors($validator);
         }

          $inventory = Inventory::findOrFail($id);

         $newItem = new Item;
         $newItem->inventory_id = $inventory->id;
         $newItem->name = $request->name;
         $newItem->image_url = $request->image_url;
         $newItem->url = $request->url;
         $newItem->comment = $request->comment;
         $newItem->amount = $request->amount;
         $newItem->save();
         return redirect('/manage/'.$id);
    }
}
