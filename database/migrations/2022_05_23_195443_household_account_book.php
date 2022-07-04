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


<<<<<<< HEAD

            $table->string('name',100);
            $table->string('email',254);
            $table->string('password',128);
            $table->string('grade',50);

            
=======
            // $table->string('name',100);
            // $table->string('email',254);
            // $table->string('password',128);
            // $table->string('grade',50);

<<<<<<< HEAD
            //$table->system_columns(); //共通カラム定義の呼ぶ
=======
>>>>>>> 854bab22770f0ff31524eb8e0308456890a3d3db
>>>>>>> 4d88150adcf244c312b2e4c569d10f2882bafe0e
            $table->integer('user_id')->nullable();
            $table->integer('spending')->nullable();
            $table->integer('income')->nullable();
            $table->string('payment_name');
            $table->date('date');
            $table->integer('amount')->nullable();
<<<<<<< HEAD

            //$table->systemColumns(); // 共通カラム定義


=======
            //$table->systemColumns(); // 共通カラム定義
>>>>>>> 4d88150adcf244c312b2e4c569d10f2882bafe0e

        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}