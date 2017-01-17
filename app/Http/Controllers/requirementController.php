<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

class requirementController extends Controller
{
	public function index(Request $request)
	{
		return view("requirement", ["data" => Item::find($request->id)]);
	}
	
    public function create(Request $request)
	{
		$requirement = new Requirement;
		$requirement->name = $request->name;
		$requirement->description = $request->description;
		$requirement->user = Auth::User()->id;
		
		$requirement->save();
		return $requirement->toJson();
	}
		
	public function read(Request $request)
	{
		$requirement = Requirement::where("user", Auth::User()->id);
		return $requirement->toJson();
	}
	
	public function update(Request $request)
	{
		$requirement = Requirement::find($request->id);
		$requirement->name = $request->name;
		$requirement->description = $request->description;
		$requirement->user = Auth::User()->id;
		
		$requirement->save();
		return $requirement->toJson();
	}
	
	public function delete(Request $request)
	{
		$requirement = Requirement::find($request->id);
		$requirement->forceDelete();
		
		return json_encode(array("deleted"=>true));
	}
}
