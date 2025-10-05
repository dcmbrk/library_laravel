<?php

namespace App\Providers;

use App\Models\BookUser;
use Carbon\Carbon;
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
        Paginator::useTailwind();
        // BookUser::where('status', 'reading')
        // ->whereDate('due_date', '<', Carbon::today())
        // ->update(['status' => 'overdue']);

    }
}
