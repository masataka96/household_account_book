<?php

use App\Http\Controllers\Membercontroller;
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

Route::get('/targetamote',[Membercontroller::class,'targetamote'])->name('targetamote');
Route::get('/targetamotesetting',[Membercontroller::class,'targetamotesetting'])->name('targetamotesetting');
