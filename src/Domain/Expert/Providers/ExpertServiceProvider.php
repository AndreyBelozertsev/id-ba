<?php

namespace Domain\Expert\Providers;

use Illuminate\Support\ServiceProvider;

class ExpertServiceProvider extends ServiceProvider
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
