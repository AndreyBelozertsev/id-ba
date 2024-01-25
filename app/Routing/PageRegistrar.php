<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Contracts\Routing\Registrar;

final class PageRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

            Route::get('/', [PageController::class, 'home'])->name('home');

            Route::get('/personal', [PageController::class, 'personal'])->name('personal.index');

            Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy.index');

            Route::get('/regulations', [PageController::class, 'regulations'])->name('regulations.index');

            Route::get('/about', [PageController::class, 'about'])->name('about.index');
            
            
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->middleware(['auth', 'verified'])->name('dashboard');

        });
    }
}