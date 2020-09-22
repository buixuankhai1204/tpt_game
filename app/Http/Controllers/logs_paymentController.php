<?php

namespace App\Http\Controllers;

use App\logs_payment;

use Illuminate\Http\Request;

class logs_paymentController extends Controller
{
    //
    public function index(){
        $card=logs_payment::limit(5);
        return view('check',['card'=>$card]);
        
    }
    public function check_user_id(Request $request){
        $item_user_id=$request->input('user_id');
        $item_status=$request->status;
        $item_pay_method=$request->pay_method;
        $item_transaction_id=$request->transaction_id;
        if(isset($item_user_id) && isset($item_status)){
            $card=logs_payment::where([
                ['user_id',  $item_user_id],
                ['status',  $item_status]
            ])->get();
            return view('check',['card'=>$card]);
        }
        
        elseif(isset($item_transaction_id) && isset($item_pay_method)){
            $card=logs_payment::where([
                ['transaction_id',  $item_transaction_id],
                ['pay_method',  $item_pay_method]
            ])->get();
            return view('check',['card'=>$card]);
        }
        elseif(isset($item_user_id) && isset($item_pay_method)){
            $card=logs_payment::where([
                ['item_user_id',  $item_user_id],
                ['pay_method',  $item_pay_method]
            ])->get();
            return view('check',['card'=>$card]);
        }
        elseif(isset($item_status) && isset($item_pay_method)){
            $card=logs_payment::where([
                ['status',  $item_status],
                ['pay_method',  $item_pay_method]
            ])->get();
            return view('check',['card'=>$card]);
        }
        
        elseif(isset($item_status)){
            $card=logs_payment::where([
                ['status',  $item_status]
            ])->get();
            return view('check',['card'=>$card]);
        }
        elseif(isset($item_user_id)){  
            $card=logs_payment::where([
                ['user_id',  $item_user_id],
            ])->get();
            return view('check',['card'=>$card]);
        }
        elseif(isset($item_pay_method)){
            $card=logs_payment::where([
                ['pay_method',  $item_pay_method]
            ])->get();
            return view('check',['card'=>$card]);
        }
        elseif(isset($item_transaction_id)){
            $card=logs_payment::where([
                ['transaction_id',  $item_transaction_id]
            ])->get();
            return view('check',['card'=>$card]);
        }
        
        
    }
}
