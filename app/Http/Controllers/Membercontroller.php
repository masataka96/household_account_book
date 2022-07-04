<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Targetamountsetting;
class Membercontroller extends Controller
{

    // データの取得
    public function __construct()
    {
        $this->payment = new Payment();
    }

    // 目標金額とデータの取得
    public function targetamount(Request $request){
        $money = $request->input('money');
        $payments = $this->payment->findAllPayments();
        $targetamountsetting = Targetamountsetting::where('user_id',1)->first();
        return view('targetamount')->with([
            'money' => $money,
            'payments' => $payments,
            'targetamountsetting' => $targetamountsetting,
        ]);

    }




    // 目標金額の設定画面の表示
    public function targetamountsetting(Request $request){
        $tas=Targetamountsetting::where('user_id',1)->first();
        //dd($tas);
        if ($tas){
            $targetamountsetting=$tas->targetamountsetting;

        }else{
            $targetamountsetting='';
        }
        

        return view('targetamountsetting')->with([
            'targetamountsetting'=>$targetamountsetting,
        ]);
    }
    // 目標金額画面を設定してデータを取得する
    public function targetamountpost(Request $request){
        $tas=Targetamountsetting::where('user_id',1)->first();
        if($tas){
            $tas->targetamountsetting=$request->money;
            $tas->save();
        }else{
            $tas = new Targetamountsetting();
            $tas->targetamountsetting = $request->money;
            $tas->user_id=1;
            $tas->save();
        }
        return redirect('targetamount');
    }
    
}



