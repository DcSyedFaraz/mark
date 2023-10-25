<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameType;
use App\Models\Request as Requests;
use Session;
use Stripe;

class RequestController extends Controller
{
    public function request(){
        $games = GameType::get();
        return view('users.request',compact('games'));
     }

     public function requestStore(Request $request){
        
            $Request = new Requests();
            $Request->user_id = Auth::user()->id;
            $Request->game_id = $request->game_id;
            $Request->save();
            session::flash('success','Request Successfully');
            return redirect()->back();
     }
}
