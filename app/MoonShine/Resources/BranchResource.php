<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use Domain\User\Models\Branch;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class BranchResource extends ModelResource
{
    protected string $model = Branch::class;

    protected string $title = 'Категории';

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
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

}
