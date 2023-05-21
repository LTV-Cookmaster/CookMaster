<?php

namespace App\Providers;

<<<<<<< Updated upstream


use App\Models\Subscription;
use App\Models\User;
use Illuminate\Pagination\Paginator;
=======
use App\Models\Subscription;
use App\Models\User;
>>>>>>> Stashed changes
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< Updated upstream
        Paginator::useBootstrapFive();
=======
        Cashier::useCustomerModel(User::class);
        Cashier::useSubscriptionModel(Subscription::class);
>>>>>>> Stashed changes
    }
}
