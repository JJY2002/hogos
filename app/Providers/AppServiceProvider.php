<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $table_no = session('table_no');

            $totalQuantity = 0;
            if ($table_no) {
                $order = Order::with('items')->where('table_no', $table_no)->where('order_status', 'Pending')->first();
                if ($order) {
                    $totalQuantity = $order->items->sum('quantity');
                }
            }

            $view->with('cartQuantity', $totalQuantity);
        });
    }
}
