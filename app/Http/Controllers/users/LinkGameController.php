<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameType;
use App\Models\LinkGame;
use Session;
use Stripe;


class LinkGameController extends Controller
{
    public function linkgame(){
        $gamelink = LinkGame::with('games')->get();
        $games = GameType::get();
        return view('users.linkgame',compact('gamelink','games'));
     }

     public function linkgameStore(Request $request){
        // dd($request->all());    
        $Request = new LinkGame();
        $Request->user_id = Auth::user()->id;
        $Request->game_id = $request->game_id;
        $Request->game_link = $request->game_link;
        $Request->save();

        session::flash('success','Game Link create Successfully');
        return redirect()->back();
    }
    public function linkgameTrash($id){
        
        $gameLink = LinkGame::where('id',$id)->delete();
        session::flash('success','Game Link Deleted Successfully');
        return redirect()->back();
    }
}
