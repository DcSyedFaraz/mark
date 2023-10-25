<?php

namespace App\Http\Controllers\users;

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
    public function transactions(){
       
         $deposit =GameDeposit::with('games','user')->where('user_id',Auth::user()->id)->get();
         $withdraw =GameWithdraw::with('games','user')->where('user_id',Auth::user()->id)->get();
         $redeem =Redeem::with('games','games.link_game','user')->where('user_id',Auth::user()->id)->get();
         return view('users.transactions',compact('deposit','redeem','withdraw'));
    }

    public function transaction_deposit(){
        $deposit =GameDeposit::with('games','user')->get();
        return view('transaction.deposit',compact('deposit'));
    }

    public function transaction_redeems(){
        $redeem =Redeem::with('games','games.link_game','user')->get();
        return view('transaction.redeem',compact('redeem'));
        
    }

    public function transaction_withdrawals(){
        $withdraw =GameWithdraw::with('games','user')->get();
        return view('transaction.withdraw',compact('withdraw'));
        
    }



}
