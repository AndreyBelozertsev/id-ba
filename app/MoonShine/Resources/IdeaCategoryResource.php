<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use Domain\Idea\Models\IdeaCategory;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class IdeaCategoryResource extends ModelResource
{
    protected string $model = IdeaCategory::class;

    protected string $title = 'Категории идей';

    protected string $sortColumn = 'sort'; 
 
    protected string $sortDirection = 'asc'; 

    public string $column = 'title';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title'),
                
                Number::make('Порядок сортировки','sort')
                    ->sortable(),

                Image::make('Иконка','thumbnail')
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('idea-category') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->hideOnIndex(),

                Textarea::make('Содержание','content')
                    ->hideOnIndex(),

                Select::make('Статус', 'status')
                    ->options([
                        true => 'Активный',
                        false => 'Не активный'
                    ]) 
                    ->badge(fn($status, Field $field) => $status ? 'green' : 'red')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array 
    {
        return ['create', 'view', 'update' ];
    } 
    
}
