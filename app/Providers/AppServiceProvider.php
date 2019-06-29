<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Pharmacy;
use App\Medicine;
use App\Medicine_Pharmacy_View;



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
        Schema::defaultStringLength(191);


        // Share Data at all views in Footer Page
        $latest_Categories  = Medicine_Pharmacy_View::take(5)->orderby('id','DESC')->groupBy('Category_name')->get(); 
        $latest_Medicine    = Medicine::take(5)->orderby('id','DESC')->get(); 
        $latest_Pharmacy    = Pharmacy::take(5)->orderby('id','DESC')->get(); 
         View::share('cate', $latest_Categories);
         View::share('Medi', $latest_Medicine);
         View::share('Pharm', $latest_Pharmacy);
       

        

    }
}
