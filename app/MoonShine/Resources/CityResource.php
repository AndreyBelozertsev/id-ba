<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use Domain\Place\Models\City;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\IdeaResource;
use MoonShine\Fields\Relationships\BelongsToMany;

class CityResource extends ModelResource
{
    protected string $model = City::class;

    protected string $title = 'География';

    protected string $sortColumn = 'sort'; 
 
    protected string $sortDirection = 'asc'; 

    public string $column = 'title';

    public function fields(): array
    {
        return [
            Block::make([
                Number::make('Порядок сортировки','sort')
                    ->sortable(),
                Text::make('Название', 'title'),
                BelongsToMany::make('Идеи', 'ideas', fn($item) => $item->title,
                    new IdeaResource()
                )
                    ->selectMode()
                    ->onlyCount()
                    ->readonly(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
