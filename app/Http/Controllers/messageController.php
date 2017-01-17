<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class messageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view("message", ["data" => Item::find($request->id)]);
    }

    public function create(Request $request) {
        $message = new Message;
        $message->description = $request->description;
        $message->to = $request->to;
        $message->from = $request->from;
        $message->item = $request->item;

        $message->save();
        return $message->toJson();
    }

    public function read() {
        $message = Message::where("from", Auth::User()->id)->get();
        return $message->toJson();
    }

    public function delete(Request $request) {
        $message = Message::find($request->id);
        $message->forceDelete();
        return json_encode(array("deleted" => true));
    }

}
