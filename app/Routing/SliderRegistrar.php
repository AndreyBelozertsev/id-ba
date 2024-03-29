<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

final class SliderRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

        });
    }
}
