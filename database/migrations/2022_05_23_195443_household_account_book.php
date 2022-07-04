<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HouseholdAccountBook extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();


            $table->string('name',100);
            $table->string('email',254);
            $table->string('password',128);
            $table->string('grade',50);

            //$table->system_columns(); //共通カラム定義の呼ぶ
            $table->integer('user_id')->nullable();
            $table->integer('spending')->nullable();
            $table->integer('income')->nullable();
            $table->string('name');
            $table->date('date');
            $table->integer('amount')->nullable();
            //$table->systemColumns(); // 共通カラム定義

        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}