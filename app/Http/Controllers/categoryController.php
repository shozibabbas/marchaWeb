<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class categoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view("category", ["data" => Item::find($request->id)]);
    }
    
    public function create(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        
        $category->save();
        return $category->toJson();
    }
    
    public function read(Request $request)
    {
        $category = Category::with("items")->where("id", $request->id)->get();
        return $category->toJson();
    }
    
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        
        $category->save();
        return $category->toJson();
    }
    
    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if (is_null($category->items))
        {
            $category->forceDelete();
            return json_encode(array("deleted"=>true));
        }
        else
            return json_encode(array("deleted"=>false));
    }

}
