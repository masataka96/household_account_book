<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Membercontroller extends Controller
{
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



