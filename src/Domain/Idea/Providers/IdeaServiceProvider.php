<?php

namespace Domain\Idea\Providers;

use Illuminate\Support\ServiceProvider;

class IdeaServiceProvider extends ServiceProvider
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
