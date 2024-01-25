<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use MoonShine\Fields\ID;

use Domain\User\Models\Role;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\MoonShineUserRoleResource;

class RoleResource extends MoonShineUserRoleResource
{
    public string $model = Role::class;

    public function getActiveActions(): array 
    {
        return ['view'];
    } 
}
