<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inventory;
use Validator;
use Auth;


class CreateController extends Controller
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
    	$inventory = Inventory::where('user_id',$user_id)->orderBy('id', 'desc')->paginate(10);
        return view('create' , compact('inventory'));
     }

    public function save(Request $request)
    {
  $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
         ]);

         if ($validator->fails()) {
             return
             redirect('/create')
                 ->withInput()
                 ->withErrors($validator);
         }
         $newInventory = new Inventory;
         $newInventory->user_id = Auth::user()->id;
         $newInventory->name = $request->name;
         $newInventory->save();

       return redirect('/create');
    }

    public function remove($id)
    {
    	$inventory = Inventory::find($id);
    	if($inventory->user_id != Auth::user()->id){
    		return view('home');
    		
    	}
    	$inventory->destroy($id);
        return redirect('/create');
    }

}
