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

            $table->system_columns(); //共通カラム定義の呼び出し

        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
