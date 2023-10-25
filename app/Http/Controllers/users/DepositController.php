<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameType;
use App\Models\GameDeposit;
use App\Models\WalletHistory;
use App\Models\Order;
use App\Models\Product;
use Session;
use Stripe;


class DepositController extends Controller
{
    public function deposit(){
       $games = GameType::get();
       return view('users.deposit',compact('games'));
     }

     public function depositStore(Request $request){
        // Depost game History
      //   dd($request->all());
        $user_id = Auth::user()->id; 
       
         $game_deposit = new GameDeposit();
         $game_deposit->user_id = $user_id;
         $game_deposit->game_id = $request->game_id;
         $game_deposit->amount = $request->amount;
         $game_deposit->method = $request->dmethod;
         $game_deposit->save();

         if(isset($request->dmethod) == 2){
            $users =User::where('id',$user_id)->first();
            $users->deposit($request->amount);
        
         //    $walletHistory =new WalletHistory();
         //    $walletHistory->user_id = $users->id;
         //    $walletHistory->amount = $request->amount;
         //    $walletHistory->type = 'Deposit to Game';
         //    $walletHistory->status = 1;
         //    $walletHistory->save();
         }

         session::flash('success','Game Deposit Successfully');
         return redirect()->back();

      }
}
