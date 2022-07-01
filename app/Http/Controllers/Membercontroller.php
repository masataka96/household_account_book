<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Membercontroller extends Controller
{
    // 目標金額を保持
    public function targetamote(Request $request){
        $money = $request->input('money');
       
        return view('targetamote')->with([
            'money' => $money
            
        ]);

    }

    // 目標金額の設定
    public function targetamotesetting(Request $request){

        $targetamotesetting = $request->input('targetamotesetting');
        

        return view('targetamotesetting');
    }

    
}



