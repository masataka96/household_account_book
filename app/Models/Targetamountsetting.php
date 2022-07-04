<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Targetamountsetting extends Model
{
        use HasFactory;

        // モデルに関連つけるテーブル
        protected $table = 'targetamountsettings';

        

        // 登録可能なカラム
        protected $fillable = [
            'targetamountsetting',
            'user_id',
            'income',
            'spending',
        ];


    }



    