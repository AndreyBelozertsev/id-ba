<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Idea\Providers\IdeaServiceProvider;
use Domain\News\Providers\NewsServiceProvider;
use Domain\User\Providers\UserServiceProvider;
use Domain\Place\Providers\PlaceServiceProvider;
use Domain\Expert\Providers\ExpertServiceProvider;
use Domain\Slider\Providers\SliderServiceProvider;



class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(
            UserServiceProvider::class  
        );

        $this->app->register(
            IdeaServiceProvider::class  
        );

        $this->app->register(
            PlaceServiceProvider::class  
        );

        $this->app->register(
            ExpertServiceProvider::class  
        );

        $this->app->register(
            SliderServiceProvider::class  
        );

        $this->app->register(
            NewsServiceProvider::class  
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
