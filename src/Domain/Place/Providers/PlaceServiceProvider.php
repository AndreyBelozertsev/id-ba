<?php

namespace Domain\Place\Providers;

use Illuminate\Support\ServiceProvider;

class PlaceServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->app->register(
            ActionsServiceProvider::class
        );
    }
}
