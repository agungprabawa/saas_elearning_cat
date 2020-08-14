<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;
use App\Channels\DatabaseChannel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME,'id_ID.UTF8');
        Schema::defaultStringLength(191);
        
//        Schema::disableForeignKeyConstraints();
        $this->app->instance(IlluminateDatabaseChannel::class, new DatabaseChannel());
    //    $dbLang = collect(DB::select('SELECT @@lc_time_names as lang'))->first();
   
    }
}
