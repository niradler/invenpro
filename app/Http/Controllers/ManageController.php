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
    *reponse to route /manage
     */
    public function index()
    {
             $user_id = Auth::user()->id;
        $inventory = Inventory::where('user_id',$user_id)->orderBy('id', 'desc')->paginate(10);
        return view('manage' , compact('inventory'));
    }

      /**
    *reponse to route /manage/{id}
     */
            public function show($id)
    {
         $inventory = Inventory::findOrFail($id);
         if($inventory->user_id != Auth::user()->id)
         {
         return view('home');
        }
        //$items= $inventory->items;
        $items=Item::where('inventory_id',$inventory->id)->orderBy('id', 'desc')->paginate(10);
        return view('manageOne' , compact('inventory','items'));
    }

      /**
    *toggle share field for inventory
     */
       public function share($id)
    {
             $user_id = Auth::user()->id;
        $inventory = Inventory::where('user_id',$user_id)->findOrFail($id);
        if($inventory->share){
           $inventory->share = 0;
        }
        else{
            $inventory->share = 1;
        }
        
        $inventory->save();
        return redirect('manage');

    }

   /*
   show item update page
    */
      public function itemUpdate($id,$item_id)
    {
         $item = Item::findOrFail($item_id);
         $inventory = Inventory::findOrFail($id);
         if($inventory->user_id != Auth::user()->id)
         {
         return view('home');
        }
        return view('item' , compact('item'));
    }

    /*
    remove item
     */
        public function remove($id,$item_id)
    {
        $item = Item::findOrFail($item_id);
        $item->destroy($item_id);
        return redirect('/manage/'.$id);
    }

    /*
        save new item    
     */
        public function save($id,Request $request)
    {
  $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
              'amount' => 'numeric',
              'url' => 'url',
              'image_url' => 'url',
              'comment' => 'max:255',
             
         ]);

         if ($validator->fails()) {
             return
             redirect('manage/'.$id)
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

    /*
    update an item
     */
    public function update($id,$item_id,Request $request)
    {
  $validator = Validator::make($request->all(), [
               'name' => 'required|max:255',
              'amount' => 'numeric',
              'url' => 'url',
              'image_url' => 'url',
              'comment' => 'max:255',
         ]);

         if ($validator->fails()) {
             return
             redirect('manage/'.$id.'/item/'.$item_id)
                 ->withInput()
                 ->withErrors($validator);
         }

         $newItem = Item::findOrFail($item_id);
         $newItem->name = $request->name;
         $newItem->image_url = $request->image_url;
         $newItem->url = $request->url;
         $newItem->comment = $request->comment;
         $newItem->amount = $request->amount;
         $newItem->save();
         return redirect('/manage/'.$id);
    }
}
