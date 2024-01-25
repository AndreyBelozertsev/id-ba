<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use Domain\Slider\Models\Slider;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class SliderResource extends ModelResource
{
    protected string $model = Slider::class;

    protected string $title = 'Цитаты';

    public string $column = 'name';

    public function fields(): array
    {
        return [
            Block::make([
                
                Text::make('ФИО', 'name')
                    ->required(),

                Text::make('Должность', 'position')
                    ->required(),

                Textarea::make('Содержание','content')
                    ->hideOnIndex(),

                Image::make('Обложка','thumbnail') 
                    ->hideOnIndex()
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('slider') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']),

                Number::make('Порядок сортировки','sort')
                    ->sortable(),
                    
                Switcher::make('Активный', 'status')
                    ->required()
                    ->default(true)
                
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
