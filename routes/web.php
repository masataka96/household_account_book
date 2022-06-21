<?php

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