<?php

use App\Http\Controllers\Membercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::middleware(['login_auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //一覧画面の表示
    Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    //収支の登録画面の表示
    Route::get('/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    //収支の登録処置
    Route::post('/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
    //収支の編集画面
    Route::get('/edit/{id}', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payment.edit');
    // 収支の更新処理
    Route::post('/update/{id}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
    //収支の削除処置
    Route::post('/destroy{id}', [App\Http\Controllers\PaymentController::class, 'destroy'])->name('payment.destroy');
    
    //ホーム画面
    Route::get('/tarukame_home', [App\Http\Controllers\kakeiboController::class,'kakeibo_home']);
    //月別画面
    Route::get('/tarukame_totalling', [App\Http\Controllers\kakeiboController::class,'kakeibo_list']);
    //次の月を取得
    Route::get('/tukibetu/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_month']);
    //前の月を取得
    Route::get('/tukibetu_return/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_month']);
    //年別で取得
    Route::get('/tarukame_nenbetu', [App\Http\Controllers\kakeiboController::class,'kakeibo_nenbetu']);
    //次の年を取得
    Route::get('/nenbetu/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_year']);
    //前の年を取得
    Route::get('/nenbetu_return/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_year']);
    //月別画面でinputdataで検索する
    Route::post('/data_search', [App\Http\Controllers\kakeiboController::class,'data_search']);
<<<<<<< HEAD

});

//一覧画面の表示
Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
//収支の登録画面の表示
Route::get('/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
//収支の登録処置
Route::post('/store', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
//収支の編集画面
Route::get('/edit/{id}', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payment.edit');
// 収支の更新処理
Route::post('/update/{id}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
//収支の削除処置
Route::post('/destroy{id}', [App\Http\Controllers\PaymentController::class, 'destroy'])->name('payment.destroy');



//ホーム画面
Route::get('/tarukame_home', [App\Http\Controllers\kakeiboController::class,'kakeibo_home']);
//月別画面
Route::get('/tarukame_totalling', [App\Http\Controllers\kakeiboController::class,'kakeibo_list']);
//次の月を取得
Route::get('/tukibetu/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_month']);
//前の月を取得
Route::get('/tukibetu_return/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_month']);
//年別で取得
Route::get('/tarukame_nenbetu', [App\Http\Controllers\kakeiboController::class,'kakeibo_nenbetu']);
//次の年を取得
Route::get('/nenbetu/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_year']);
//前の年を取得
Route::get('/nenbetu_return/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_year']);
//月別画面でinputdataで検索する
Route::post('/data_search', [App\Http\Controllers\kakeiboController::class,'data_search']);
//年別画面で数値を自分で入力して検索する
Route::post('/data_search_seireki', [App\Http\Controllers\kakeiboController::class,'data_search_seireki']);


Route::get('/targetamote',[Membercontroller::class,'targetamote'])->name('targetamote');
Route::get('/targetamotesetting',[Membercontroller::class,'targetamotesetting'])->name('targetamotesetting');




//ホーム画面
Route::get('/tarukame_home', [App\Http\Controllers\kakeiboController::class,'kakeibo_home']);
//月別画面
Route::get('/tarukame_totalling', [App\Http\Controllers\kakeiboController::class,'kakeibo_list']);
//次の月を取得
Route::get('/tukibetu/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_month']);
//前の月を取得
Route::get('/tukibetu_return/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_month']);
//年別で取得
Route::get('/tarukame_nenbetu', [App\Http\Controllers\kakeiboController::class,'kakeibo_nenbetu']);
//次の年を取得
Route::get('/nenbetu/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_year']);
//前の年を取得
Route::get('/nenbetu_return/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_year']);
//月別画面でinputdataで検索する
Route::post('/data_search', [App\Http\Controllers\kakeiboController::class,'data_search']);
//年別画面で数値を自分で入力して検索する
Route::post('/data_search_seireki', [App\Http\Controllers\kakeiboController::class,'data_search_seireki']);

// 目標金額画面の表示
Route::get('/targetamount',[Membercontroller::class,'targetamount'])->name('targetamount');
// 目標金額設定画面の表示
Route::get('/targetamountsetting',[Membercontroller::class,'targetamountsetting'])->name('targetamountsetting');

Route::post('/targetamountpost',[Membercontroller::class,'targetamountpost'])->name('targetamountpost');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

=======
    //年別画面で数値を自分で入力して検索する
    Route::post('/data_search_seireki', [App\Http\Controllers\kakeiboController::class,'data_search_seireki']);
    
    // 目標金額画面の表示
    Route::get('/targetamount',[Membercontroller::class,'targetamount'])->name('targetamount');
    // 目標金額設定画面の表示
    Route::get('/targetamountsetting',[Membercontroller::class,'targetamountsetting'])->name('targetamountsetting');
    
    Route::post('/targetamountpost',[Membercontroller::class,'targetamountpost'])->name('targetamountpost');
    
    
});
>>>>>>> 5f6e8cb3a5b740db9745038f4049ab38cc706716
