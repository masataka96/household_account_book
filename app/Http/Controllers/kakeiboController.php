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
    
    $dt = new Carbon();
    $seireki = $dt->year;
    $tuki= $dt->month;
    $hiduke  = $dt->day;
    
    
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->get();
        
    } elseif (!$recodes) {
       
    }
    
    $sisyutusum = DB::table('payments')->selectRaw('SUM(spending) AS total_spending')->get();
   
    $syunyusum  =   DB::table('payments')->selectRaw('SUM(income) AS total_income')->get();
   
    return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}

public function kakeibo_home()//ホーム画面で今月分のデータを取得する
{   
    
   
    $dt = new Carbon();
    $seireki = $dt->year;
    $tuki= $dt->month;
    $hiduke  = $dt->day;
    
    
    
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->get();
      
    } elseif (!$recodes) {
       
    }
    
    $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(spending) AS total_spending')->get();
   
    $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(income) AS total_income')->get();
  
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
    
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->get();
        
    } elseif (!$recodes) {
        
    }

    $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(spending) AS total_spending')->get();
   
    $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(income) AS total_income')->get();
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
    $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();
    if ($recodes) {
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->get();
        
    } elseif (!$recodes) {
        
    }


    $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(spending) AS total_spending')->get();
   
    $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(income) AS total_income')->get();
   //dd($syunyusum);
    return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
}


public function data_search(Request $request) //inputdataでデータの検索を行う

{

      $dt = new Carbon();
      $seireki1=$request->input('seireki');
      $frend = explode("-",$seireki1);
      $seireki=$frend[0];
      $tuki=$frend[1];
      $year= 2022;
        $day= 12;
        $hiduke  = $dt->day;

        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();
        if ($recodes) {
            $recodes = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->get();
            
        } elseif (!$recodes) {
            
        }
        $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(spending) AS total_spending')->get();
   
        $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->selectRaw('SUM(income) AS total_income')->get();
       //dd($syunyusum);
        return view('kakeibo_getubetu',compact('recodes','sisyutusum','syunyusum','seireki','hiduke','tuki'));
    }

    public function kakeibo_nenbetu()//年別でデータを取得
    {   
        
        
        $dt = new Carbon();
        $seireki = $dt->year;
        
      
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->exists();
        if ($recodes) {
            $recodes = DB::table('payments')->whereYear('created_at', $seireki)->get();
            
        } elseif (!$recodes) {
           
        }
        
        $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(spending) AS total_spending')->get();
   
        $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(income) AS total_income')->get();
        return view('kakeibo_nenbetu',compact('recodes','sisyutusum','syunyusum','seireki'));
    }

    public function add_year($now_seireki)////次の年を取得
    {   
        
       
    
        $dt = new Carbon();
        $seireki = $now_seireki+1;
        
        
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->exists();
        if ($recodes) {
            $recodes = DB::table('payments')->whereYear('created_at', $seireki)->get();
            
        } elseif (!$recodes) {
            
        }
    
        $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(spending) AS total_spending')->get();
   
        $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(income) AS total_income')->get();
       //dd($syunyusum);
        return view('kakeibo_nenbetu',compact('recodes','sisyutusum','syunyusum','seireki'));
    }
    
    
    
    public function return_year($now_seireki)////前の年を取得
    {   
        $dt = new Carbon();
        $seireki = $now_seireki-1;
       
        $recodes = DB::table('payments')->whereYear('created_at', $seireki)->exists();
        if ($recodes) {
            $recodes = DB::table('payments')->whereYear('created_at', $seireki)->get();
            
        } elseif (!$recodes) {
            
        }
    
    
        $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(spending) AS total_spending')->get();
   
        $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(income) AS total_income')->get();
       //dd($syunyusum);
        return view('kakeibo_nenbetu',compact('recodes','sisyutusum','syunyusum','seireki'));
    }


    
    public function data_search_seireki(Request $request)//年別画面で西暦だけでデータを取得する
     {

        $dt = new Carbon();
        $seireki=$request->input('seireki');
        
       
  
          $recodes = DB::table('payments')->whereYear('created_at', $seireki)->exists();
          if ($recodes) {
              $recodes = DB::table('payments')->whereYear('created_at', $seireki)->get();
              
          } elseif (!$recodes) {
              
          }
          $sisyutusum = DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(spending) AS total_spending')->get();
   
        $syunyusum  =   DB::table('payments')->whereYear('created_at', $seireki)->selectRaw('SUM(income) AS total_income')->get();
         //dd($syunyusum);
          return view('kakeibo_nenbetu',compact('recodes','sisyutusum','syunyusum','seireki'));
      }
  
}