<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use Domain\Page\Models\Page;
use MoonShine\Fields\TinyMce;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Pages';

    public string $column = 'title';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Заголовок', 'title')
                    ->required(),

                TinyMce::make('Содержание','content')
                    ->hideOnIndex(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
