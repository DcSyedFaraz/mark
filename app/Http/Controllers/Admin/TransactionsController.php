<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GameDeposit;
use App\Models\GameWithdraw;
use App\Models\Redeem;

use Session;
use Stripe;

class TransactionsController extends Controller
{
    public function transaction_deposit(){
        $deposit = GameDeposit::with('games','user')->get();
        return view('admin.transaction.deposit',compact('deposit'));
    }


     // Deposit Approved
     public function deposit_approved($id){
        $approved =GameDeposit::with('games','user')->where('id',$id)->first();
        $approved->status = 2;
        $approved->save();
        return redirect()->back();
    }

    public function transaction_redeems(){
        $redeem =Redeem::with('games','games.link_game','user')->get();
        return view('admin.transaction.redeem',compact('redeem'));
        
    }

    // readeems Approved
    public function redeems_approved($id){
        $approved =Redeem::with('games','games.link_game','user')->where('id',$id)->first();
        $approved->status = 2;
        $approved->save();
        return redirect()->back();
    }


    public function transaction_withdrawals(){
        $withdraw =GameWithdraw::with('games','user')->get();
        return view('admin.transaction.withdraw',compact('withdraw'));
        
    }

        // Withdrawal Approved
    public function withdrawal_approved($id){
        
        $approved =GameWithdraw::with('games','user')->where('id',$id)->first();
        $approved->status = 2;
        $approved->save();
        return redirect()->back();

    }

    


}
