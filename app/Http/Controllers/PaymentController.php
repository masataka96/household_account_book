<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->payment = new Payment();
    }

    /**
     * 一覧画面
     */
    public function index()
    {
        $userId = \Auth::id();

        $payments = $this->payment->fetchAllByUserId($userId);

        return view('payment.index', compact('payments'));
    }

    /**
     * 登録画面
     */
    public function create(Request $request)
    {    
        return view('payment.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $registerPayment = $this->payment->InsertPayment($request);
        return redirect()->route('payment.index');
    }

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        return view('payment.edit', compact('payment'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $updatePayment = $this->payment->updatePayment($request, $payment);

        return redirect()->route('payment.index');
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
        // 指定されたIDのレコードを削除
        $deletePayment = $this->payment->deletePaymentById($id);
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('payment.index');
    }
}