<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Item;

class userController extends Controller
{
    public function index(Request $request)
	{
		return view("user", ["data" => User::find($request->id)]);
	}
        
        // Create already implemented by Auth
        
        public function read()
        {
            return User::find(Auth::User()->id)->toJson();
        }
	
	public function update(Request $request)
	{
		$user = User::find($request->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->dob = $request->dob;
		$user->mobile = $request->mobile;
		$user->address = $request->address;
		
		$user->save();
		return $user->toJson();
	}
        
        public function delete(Request $request)
	{
		$user = User::find($request->id);
		$user->forceDelete();
		
		return json_encode(array("deleted"=>true));
	}

}
