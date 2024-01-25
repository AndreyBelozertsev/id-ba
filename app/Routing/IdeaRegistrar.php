<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use Illuminate\Contracts\Routing\Registrar;
use App\Http\Controllers\IdeaCategoryController;

final class IdeaRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

            Route::get('/idea', [IdeaController::class, 'index'])->name('idea.index');            
            
            Route::middleware(['auth:web', 'verified'])->prefix('profile')->group(function () {

                Route::get('/idea/create', [IdeaController::class, 'create'])
                    ->name('idea.create');

                Route::post('/idea', [IdeaController::class, 'store'])
                    ->name('idea.store');

                Route::get('/idea/{id}', [IdeaController::class, 'show'])
                    ->name('idea.show');

                Route::get('/idea/{id}/edit', [IdeaController::class, 'edit'])
                    ->name('idea.edit');
                
                Route::put('/idea/{id}', [IdeaController::class, 'update'])
                    ->name('idea.update');

                Route::put('/idea/status-implementation/{id}', [IdeaController::class, 'statusImplementationUpdate'])
                    ->name('idea.status-implementation.update');
            });
        });
    }
}
