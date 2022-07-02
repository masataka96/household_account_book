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
            $table->integer('user_id')->nullable();
            $table->integer('spending')->nullable();
            $table->integer('income')->nullable();
            $table->string('name');
            $table->date('date');
            $table->integer('amount')->nullable();
            $table->systemColumns(); // 共通カラム定義
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}