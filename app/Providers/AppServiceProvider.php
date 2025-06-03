<?php

namespace App\Providers;

use App\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        $wa = Profile::where('name','wa')->first();
        $wa2 = Profile::where('name','wa2')->first();
        $email = Profile::where('name','email')->first();
        $website = Profile::where('name','website')->first();
        $addres = Profile::where('name','office')->first();
        $sosialapp = Profile::where('group_name','socialprofile')->get();


        view()->share('wa', $wa);
        view()->share('wa2', $wa2);
        view()->share('email', $email);
        view()->share('addres', $addres);
        view()->share('sosialapp', $sosialapp);
        view()->share('website', $website);

    }
}
