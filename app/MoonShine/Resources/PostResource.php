<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use MoonShine\Fields\Text;

use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use Domain\News\Models\Post;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Новости';

    public string $column = 'title';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                    ->required(),

                Textarea::make('Краткое описание','description')
                    ->hideOnIndex(),

                TinyMce::make('Содержание','content')
                    ->hideOnIndex(),

                Image::make('Обложка','thumbnail') 
                    ->hideOnIndex()
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('article') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']) ,
                    
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
