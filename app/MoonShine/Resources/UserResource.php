<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use Domain\User\Models\User;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\BelongsTo;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи';

    protected string $sortColumn = 'family'; 
 
    protected string $sortDirection = 'asc'; 



    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Фамилия', 'family'),
                Text::make('Имя', 'name'),
                Text::make('Отчетство', 'patronymic'),
                Date::make('Дата рождения', 'birthday')
                    ->format('d.m.Y'),
                BelongsTo::make('Категория', 'branch', fn($item) => "$item->title" , new BranchResource())
                    ->readonly()
                    ->disabled(),
                HasMany::make('Идеи', 'ideas', null, new IdeaResource())
                    ->readonly()
                    ->disabled()
                    ->onlyLink('author'),
                Date::make('Дата регистрации', 'created_at')
                    ->hideOnIndex(),
                Email::make('Email')
                    ->hideOnIndex() 
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array 
    {
        return ['view'];
    } 
}
