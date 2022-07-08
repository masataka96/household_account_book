<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('systemColumns', function () {
            //$this->timestamp('created_at')->nullable();
           // $this->unsignedBigInteger('created_by')->nullable();
           // $this->timestamp('updated_at')->nullable();
           // $this->unsignedBigInteger('updated_by')->nullable();
           // $this->timestamp('deleted_at')->nullable();
      //   $this->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    
}