<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\GiftCard;
use Session;
use Stripe;


class GiftCardController extends Controller
{
    public function giftcard(){
        return view('users.giftcard');
     }

     public function giftcardStore(Request $request){
            // dd($request->all());
        $user_id = Auth::user()->id; 
         $redeem = new GiftCard();
         $redeem->user_id = $user_id;
         $redeem->card_no = $request->card_no;
         $redeem->save();

         session::flash('success','Gift Card create Successfully');
         return redirect()->back();
     }
}
