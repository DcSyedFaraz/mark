<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\WalletHistory;
use Session;
use Stripe;

class DepositWalletController extends Controller
{
    //  Deposit Wallet Page
    public function depositwallet(){
        return view('users.depositwallet');
     }

     //  Deposit Wallet storePage
     public function depositWalletStore(Request $request){
            
     
            $id =Auth::user()->id;
            
            $deposit_amount=$request->dep_amount;
            $users =User::where('id',$id)->first();
            $users->deposit($deposit_amount);
            
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $request->dep_amount,
                    "currency" => "USD",
                    "source" => $request->stripeToken,
                    "description" => "This payment is testing purpose of techsolutionstuff",
            ]);
            // Wallet History
            $walletHistory =new WalletHistory();
            $walletHistory->user_id = $users->id;
            $walletHistory->amount = $deposit_amount;
            $walletHistory->type = 'Deposit';
            $walletHistory->status = 1;
            $walletHistory->save();
            

         return redirect()->back()->with('success','Wallet Amount Deposit Has been submitted successfully');
     }
}
