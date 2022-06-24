<?php

namespace App\Providers;
use Illuminate\Database\Schema\Blueprint;


use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //データベース用system_columnsを定義

        //Blueprint::macro('system_columns', function () {
            ///$this->timestamp('created_at')->nullabel();
           // $this->unsignedBigInteger('created_by')->nullbel();
           /// $this->timestamp('updated_at')->nullabel();
           /// $this->unsignedBigInteger('updated_by')->nullabel();
            ///$this->timestamp('deleted_at')->nullabel();
            ///$this->unsignedBigInteger('deleted_by')->nullabel();
      //  });
    }

}