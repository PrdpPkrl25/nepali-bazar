<?php

namespace App\Providers;

use App\Cakeapp\Product\Model\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $categories=Category::with('subCategories')->whereNull('main_category_id')->get();
        View::share('categories', $categories);

        Schema::defaultStringLength(191);
    }
}
