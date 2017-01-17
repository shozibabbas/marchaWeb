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

    public function getItems(Request $request) {
        $items = Category::with('items')->where("id", $request->id)->get();
        return $items->toJson();
    }
    
    public function create(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        
        $category->save();
        return $category->toJson();
    }

}
