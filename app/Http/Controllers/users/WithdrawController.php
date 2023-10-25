<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameType;
use App\Models\GameWithdraw;
use App\Models\WalletHistory;
use Session;
use Stripe;


class WithdrawController extends Controller
{
    public function withdraw(){
        $games = GameType::get();
        return view('users.withdraw',compact('games'));
     }
    
    public function withdrawStore(Request $request){
            // dd($request->all());
            $user_id = Auth::user()->id; 
    
            $game_withdraw = new GameWithdraw();
            $game_withdraw->user_id = $user_id;
            $game_withdraw->game_id = $request->game_id;
            $game_withdraw->amount = $request->amount;
            $game_withdraw->method = 2;
            $game_withdraw->save();

            $users =User::where('id',$user_id)->first();
            $users->forceWithdraw($request->amount);
    
            $walletHistory =new WalletHistory();
            $walletHistory->user_id = $users->id;
            $walletHistory->amount = $request->amount;
            $walletHistory->type = 'withdraw';
            $walletHistory->status = 1;
            $walletHistory->save();

            
         session::flash('success','Withdraw Successfully');
         return redirect()->back();
    } 
}
