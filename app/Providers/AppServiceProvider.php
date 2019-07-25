<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductType;
use App\Models\Language;

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
        View::composer('parts.header', function ($view) {
            $languages = Language::all();

            $view->with(compact('languages'));
        });

        View::composer('parts.side-menu', function ($view) {
            $product_types = ProductType::all();

            $view->with(compact('product_types'));
        });
    }
}
