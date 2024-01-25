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
use Domain\Expert\Models\Expert;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class ExpertResource extends ModelResource
{
    protected string $model = Expert::class;

    protected string $title = 'Эксперты';

    protected string $sortColumn = 'sort'; 
 
    protected string $sortDirection = 'asc'; 

    public string $column = 'family';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Фамилия', 'family'),
                Text::make('Имя', 'name'),
                Text::make('Отчество', 'patronymic'),
                Number::make('Порядок сортировки','sort')
                    ->sortable(),
                Image::make('Фото','thumbnail')
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('expert') . '/' . Str::random(10) . '.' . $file->extension();
                    })
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
}
