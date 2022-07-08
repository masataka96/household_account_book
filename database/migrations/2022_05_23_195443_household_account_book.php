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
            $table->string('name',100)->nullable();
            $table->string('email',254)->nullable();
            $table->string('password',128)->nullable();
            $table->string('grade',50)->nullable();
            $table->string('payment_name',100);
            $table->integer('amount');
            $table->date('date');
            $table->integer('user_id')->nullable();
            $table->integer('spending')->nullable();
            $table->integer('income')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}