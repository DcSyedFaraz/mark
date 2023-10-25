<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameType;
use App\Models\Redeem;
use App\Models\WalletHistory;
use Session;
use Stripe;


class RedeemController extends Controller
{
    public function redeem(){
        $games = GameType::get();
        return view('users.redeem',compact('games'));
     }

     public function redeemStore(Request $request){
        // Depost game History
        // dd($request->all());
        $user_id = Auth::user()->id; 
       
         $redeem = new Redeem();
         $redeem->user_id = $user_id;
         $redeem->game_id = $request->game_id;
         $redeem->amount = $request->amount;
         $redeem->save();


             $users =User::where('id',$user_id)->first();
            $users->forceWithdraw($request->amount);
        
            $walletHistory =new WalletHistory();
            $walletHistory->user_id = $users->id;
            $walletHistory->amount = $request->amount;
            $walletHistory->type = 'withdraw';
            $walletHistory->status = 1;
            $walletHistory->save();

         session::flash('success','Redeem Successfully');
         return redirect()->back();

      }
}
