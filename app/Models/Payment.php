<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    //モデルに関連付けるテーブル
    protected $table = 'payments';

    //テーブルに関連付ける主キー
    protected $primarykey = 'id';

    //登録・更新可能なカラムの指定
    protected $fillable = [
        'id',
        'spending',
        'income',
        'payment_name',
        'date',
        'amount',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];
    /**
     *  paymentを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //一覧画面表示用にpaymentsテーブルから全てのデータを取得
    public function findAllPayments()
    {
        return Payment::all();
    }

    /**
     * リクエストされたIDをもとにpaymentsテーブルのレコードを1件取得
     */
    public function findPaymentById($id)
    {
        return Payment::find($id);
    }

     /**
     * 登録処理
     */
    public function InsertPayment($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'payment_name' => $request->payment_name,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
    }

    /**
     * 更新処理
     */
    public function updatePayment($request, $payment)
    {
        $result = $payment->fill([
            'payment_name' => $request->payment_name,
            'amount' => $request->amount,
            'date' => $request->date,
        ])->save();

        return $result;
    }

    /**
     * 削除処理
     */
    public function deletePaymentById($id)
    {
        return $this->destroy($id);
    }
}
