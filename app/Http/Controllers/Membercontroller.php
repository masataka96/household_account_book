<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Membercontroller extends Controller
{
    public function targetamote(Request $request){
        $money = $request->input('money');
       
        return view('targetamote')->with([
            'money' => $money
        ]);
    }

    public function targetamotesetting(Request $request){

        $targetamotesetting = $request->input('targetamotesetting');
        

        return view('targetamotesetting');
    }

    
}



