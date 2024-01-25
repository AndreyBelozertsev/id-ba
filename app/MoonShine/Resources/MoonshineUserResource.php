<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use Domain\User\Models\User;
use MoonShine\Decorations\Block;
use MoonShine\Models\MoonshineUser;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class MoonshineUserResource extends ModelResource
{
    protected string $model = MoonshineUser::class;

    protected string $title = 'Администраторы';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Имя', 'name'),
                Email::make('Email') 
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array 
    {
        return ['create', 'view', 'update', 'delete',];
    } 
}
