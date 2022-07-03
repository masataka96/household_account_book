<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Payment;
class Membercontroller extends Controller
{
    public function __construct()
    {
        $this->payment = new Payment();
    }

    // 目標金額を保持
    public function targetamount(Request $request){
        $money = $request->input('money');
        $payments = $this->payment->findAllPayments();
       
        return view('targetamount')->with([
            'money' => $money,
            'payments' => $payments
        ]);

    }




    // 目標金額の設定
    public function targetamountesetting(Request $request){

        $targetamotesetting = $request->input('targetamountesetting');
        

        return view('targetamountesetting');
    }

    
}



