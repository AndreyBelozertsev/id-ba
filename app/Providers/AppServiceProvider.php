<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Domain\User\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use MoonShine\Notifications\MoonShineNotification;

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
        Carbon::setLocale(config('app.locale'));

        Str::macro('phoneNumber', function ($string) {
            return preg_replace('/^8{1}/', '7', preg_replace('/[^0-9]/', '', $string));
        });
    }
}
