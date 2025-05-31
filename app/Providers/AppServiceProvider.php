<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // 👈 Dòng này rất quan trọng
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        Schema::defaultStringLength(191); // 👈 Dòng này giúp tránh lỗi index quá dài

        View::composer(['*'], function ($view) {
            $data_category = Category::all();
            $view->with('data_category', $data_category);
        });
    }
}
