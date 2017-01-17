<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Auth;

class itemController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view("item", ["data" => Item::find($request->id)]);
    }

    public function create(Request $request) {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->location = $request->location;
        $item->category = $request->category;
        $item->user = Auth::User()->id;
        $item->worth = $request->worth;
        $item->paymentAllowed = $request->paymentAllowed;
        $item->itemStatus = $request->itemStatus;

        $item->save();
        return json_decode($item);
    }

    public function read(Request $request) {
        $items = Item::find($request->id)->where("user", Auth::User()->id)->get();
        return $items->toJson();
    }

    public function update(Request $request) {
        $item = Item::find($request->id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->location = $request->location;
        $item->category = $request->category;
        $item->user = Auth::User()->id;
        $item->worth = $request->worth;
        $item->paymentAllowed = $request->paymentAllowed;
        $item->itemStatus = $request->itemStatus;

        $item->save();
        return json_encode($item);
    }

    public function delete(Request $request) {
        $item = Item::find($request->id);
        $item->forceDelete();

        return json_encode(array("deleted" => true));
    }

}
