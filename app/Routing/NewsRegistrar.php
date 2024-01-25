<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Contracts\Routing\Registrar;

final class NewsRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

            Route::get('/post', [PostController::class, 'index'])->name('post.index');
            
            Route::get('/post/show/{slug}', [PostController::class, 'show'])->name('post.show');

        });
    }
}
