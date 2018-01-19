<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class BrandProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidemenu', function ($view) {
            $categories = Category::with('brands')->get();
            $view->with([
                'categories' => $categories,
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
