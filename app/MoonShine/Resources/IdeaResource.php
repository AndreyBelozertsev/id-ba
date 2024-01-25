<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use Domain\Idea\Models\Idea;
use MoonShine\Fields\Select;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\UserResource;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

class IdeaResource extends ModelResource
{
    protected string $model = Idea::class;

    protected string $title = 'Идеи';
    
    protected string $sortColumn = 'created_at'; 
 
    protected string $sortDirection = 'desc'; 

    public string $column = 'title';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                    ->readonly(),
                BelongsTo::make('Категория', 'category', fn($item) => "$item->id. $item->title" , new IdeaCategoryResource())
                    ->readonly(),
                BelongsTo::make('Автор', 'author', fn($item) => "$item->family $item->name $item->patronymic" , new UserResource())
                    ->readonly()
                    ->disabled(),
                Textarea::make('Краткое описание', 'description')
                    ->hideOnIndex()
                    ->readonly(), 
                Textarea::make('Полное описание', 'content')
                    ->hideOnIndex()
                    ->readonly(), 
                BelongsToMany::make('География реализации', 'cities', fn($item) => $item->title,
                        new CityResource()
                    )
                    ->selectMode()
                    ->inLine(separator: ' ', badge: true)
                    ->readonly(),
                Select::make('Статус', 'status')
                    ->options(config('constant.status')) 
                    ->badge(function($status, Field $field){ 
                        if($status == 'moderation'){
                            return 'yellow';
                        }else if($status == 'publish'){
                            return 'green';
                        }else if($status == 'canceled'){
                            return 'red';
                        }
                    }),
        
                Textarea::make('Причина отмены', 'reason_cancellation')
                    ->showWhen(
                        'status',
                        '=',
                        'canceled'
                    )
                    ->hideOnIndex(),
                    
                Select::make('Статус реализации', 'status_implementation')
                    ->options(config('constant.status_implementation')) 
                    ->badge(function($status, Field $field){ 
                        if($status == 'receive'){
                            return 'gray';
                        }else if($status == 'process'){
                            return 'blue';
                        }else if($status == 'completed'){
                            return 'green';
                        }
                    }),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array 
    {
        return [ 'view', 'update' ];
    } 
}