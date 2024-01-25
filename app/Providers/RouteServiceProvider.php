<?php

namespace App\Providers;

use RuntimeException;
use Illuminate\Http\Request;
use App\Routing\AppRegistrar;
use App\Routing\IdeaRegistrar;
use App\Routing\NewsRegistrar;
use App\Routing\PageRegistrar;
use App\Routing\UserRegistrar;
use App\Routing\PlaceRegistrar;
use App\Routing\ExpertRegistrar;
use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    protected array $registrars =[
        AppRegistrar::class,
        PageRegistrar::class,
        UserRegistrar::class,
        IdeaRegistrar::class,
        PlaceRegistrar::class,
        ExpertRegistrar::class,
        NewsRegistrar::class,
    ];

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        $this->configureRateLimiting();

        $this->routes(function(Registrar $router){
            $this->mapRoutes($router, $this->registrars );
        });

    }

    /**
    * Configure the rate limiters for the application.
    */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('auth', function (Request $request) {
            return Limit::perMinute(20)->by($request->ip());
        });
    }

    protected function mapRoutes(Registrar $router, array $registrars):void
    {
        foreach($registrars as $registrar){
            if(! class_exists($registrar) || ! is_subclass_of($registrar, RouteRegistrar::class)){
                throw new RuntimeException(sprintf(
                    'Cannot map routes \'%s\', its not a valid routes class',
                    $registrar
                ));

            }

            (new $registrar)->map($router);
        }
    }
}