<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class kakeiboController extends Controller
{
  


//////////////////////////////////////家計簿システム//////////////////////////////////////////////////////////////////

public function kakeibo_list()
{   
    
    //$seireki = Carbon::now('Asia/Tokyo')->toDateString(); // 今日
    $dt = new Carbon();
    $seireki = $dt->year;
    $tuki= $dt->month;
    $hiduke  = $dt->day;
    $year= 2022;
    $day= 6;
    
    //$recodes = DB::table('product')->whereYear('created_at', $year)->get();->exists();
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->get();
        //dd($recodes);
    } elseif (!$recodes) {
        //$recodes = DB::table('product')->whereYear('created_at', $year)->whereMonth('created_at', $day)->decrement('count', 3);
        //dd($recodes);
    }
    //$recodes = DB::table('product')->whereYear('created_at', $year)->whereMonth('created_at', $day)->get();
    //$recodes = DB::table('product')->get();
    $sisyutusum = DB::table('payments')->where('spending')->selectRaw('SUM(amount) AS total_amount')->get();
    //dd($sisyutusum);
    
    //dd($recodes);
    $syunyusum  =   DB::table('payments')->where('income')->selectRaw('SUM(amount) AS total_amount')->get();
   //dd($syunyusum);
    return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}

public function kakeibo_home()
{   
    
   
    $dt = new Carbon();
    $seireki = $dt->year;
    $tuki= $dt->month;
    $hiduke  = $dt->day;
    $year= 2022;
    $day= 6;
    
    
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->get();
        //dd($recodes);
    } elseif (!$recodes) {
        //$recodes = DB::table('product')->whereYear('created_at', $year)->whereMonth('created_at', $day)->decrement('count', 3);
        //dd($recodes);
    }
    
    $sisyutusum = DB::table('payments')->where('spending')->selectRaw('SUM(amount) AS total_amount')->get();
   
    $syunyusum  =   DB::table('payments')->where('income')->selectRaw('SUM(amount) AS total_amount')->get();
  
    return view('kakeibo_home',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}

public function add_month($now_tuki,$now_seireki)////次の月を取得
{   
    
   

    $dt = new Carbon();
    $seireki = $now_seireki;
    $tuki= $now_tuki+1;
    $hiduke  = $dt->day;
    $year= 2022;
    $day= 12;
    if($tuki==13){
       $tuki=1;
       $seireki=$seireki+1;
    }
    //$recodes = DB::table('product')->whereYear('created_at', $year)->get();->exists();
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->get();
        
    } elseif (!$recodes) {
        
    }

    $sisyutusum = DB::table('payments')->where('spending')->selectRaw('SUM(amount) AS total_amount')->get();
    //dd($sisyutusum);
    
    //dd($recodes);
    $syunyusum  =   DB::table('payments')->where('income')->selectRaw('SUM(amount) AS total_amount')->get();
   //dd($syunyusum);
    return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}



public function return_month($now_tuki,$now_seireki)////前の月を取得
{   
    $dt = new Carbon();
    $seireki = $now_seireki;
    $tuki= $now_tuki-1;
    $hiduke  = $dt->day;
    $year= 2022;
    $day= 12;
    if($tuki==0){
       $tuki=12;
       $seireki=$seireki-1;
    }
    //$recodes = DB::table('product')->whereYear('created_at', $year)->get();->exists();
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->get();
        
    } elseif (!$recodes) {
        
    }


    $sisyutusum = DB::table('payments')->where('spending')->selectRaw('SUM(amount) AS total_amount')->get();
    //dd($sisyutusum);
    
    
    $syunyusum  =   DB::table('payments')->where('income')->selectRaw('SUM(amount) AS total_amount')->get();
   //dd($syunyusum);
    return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}


public function data_search(Request $request) {

      $dt = new Carbon();
      $seireki1=$request->input('seireki');
      $frend = explode("-",$seireki1);
      $seireki=$frend[0];
      $tuki=$frend[1];
      $year= 2022;
        $day= 12;
        $hiduke  = $dt->day;

        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->exists();
        if ($recodes) {
            $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $hiduke)->get();
            
        } elseif (!$recodes) {
            
        }
        $sisyutusum = DB::table('payments')->where('spending')->selectRaw('SUM(amount) AS total_amount')->get();
        //dd($sisyutusum);
        
        
        $syunyusum  =   DB::table('payments')->where('income')->selectRaw('SUM(amount) AS total_amount')->get();
       //dd($syunyusum);
        return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
    }



}