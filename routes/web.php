<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/tarukame_totalling', [App\Http\Controllers\kakeiboController::class,'kakeibo_list']);

Route::get('/tarukame_home', [App\Http\Controllers\kakeiboController::class,'kakeibo_home']);

Route::get('/tukibetu/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'add_month']);

Route::get('/tukibetu_return/{now_tuki}/{now_seireki}', [App\Http\Controllers\kakeiboController::class,'return_month']);

Route::post('/data_search', [App\Http\Controllers\kakeiboController::class,'data_search']);

