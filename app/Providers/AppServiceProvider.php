<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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
        View::composer('layouts.home', function ($view) {
            $carts = collect([]);

            if (auth()->check()) {
                $carts = Cart::query()
                    ->whereBelongsTo(Auth::user())
                    ->with('product')
                    ->get();
            }

            return $view->with('carts', $carts);
        });
    }
}
