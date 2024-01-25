<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdeaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Предпринимательство',
                'thumbnail' => 'images/idea-category/2024/01/24/uLIgloulB0.svg',
            ], 
            [
                'title' => 'Молодежь',
                'thumbnail' => 'images/idea-category/2024/01/24/ifxszjkwtT.svg',
            ],  
            [
                'title' => 'Экология',
                'thumbnail' => 'images/idea-category/2024/01/24/6kzrCVA3Zw.svg',
            ], 
            [
                'title' => 'Культура и искусство',
                'thumbnail' => 'images/idea-category/2024/01/24/5I0eVcPg2t.svg',
            ], 
            [
                'title' => 'Благоустройство и ЖКХ',
                'thumbnail' => 'images/idea-category/2024/01/24/AYOVJnK7xD.svg',
            ],   
            [
                'title' => 'Образование и наука',
                'thumbnail' => 'images/idea-category/2024/01/24/bRh3csqsjF.svg',
            ],
            [
                'title' => 'Транспорт',
                'thumbnail' => 'images/idea-category/2024/01/24/XJsepVVHSG.svg',
            ],
            [
                'title' => 'Социальная сфера',
                'thumbnail' => 'images/idea-category/2024/01/24/yYTJ4nKuIE.svg',
            ],
            [
                'title' => 'Семья',
                'thumbnail' => 'images/idea-category/2024/01/24/xy9Lym8ArQ.svg',
            ],
            [
                'title' => 'Сельское хозяйство',
                'thumbnail' => 'images/idea-category/2024/01/24/0WzPpNSxWs.svg',
            ],
            [
                'title' => 'Спорт',
                'thumbnail' => 'images/idea-category/2024/01/24/n74ESKtkVx.svg',
            ],
            [
                'title' => 'Информация и связь',
                'thumbnail' => 'images/idea-category/2024/01/24/YxDyVPntNs.svg',
            ],
            [
                'title' => 'Экономика и промышленность',
                'thumbnail' => 'images/idea-category/2024/01/24/TFCy7EFrLI.svg',
            ],
            [
                'title' => 'Туризм',
                'thumbnail' => 'images/idea-category/2024/01/24/WxEtmjtCpY.svg',
            ],
            [
                'title' => 'Патриотическое воспитание',
                'thumbnail' => 'images/idea-category/2024/01/24/15evTbse5N.svg',
            ],
            [
                'title' => 'Поддержка СВО',
                'thumbnail' => 'images/idea-category/2024/01/24/lbb756jRue.svg',
            ],
            [
                'title' => 'Кибербезопасность',
                'thumbnail' => 'images/idea-category/2024/01/24/ocBm76mCfR.svg',
            ],
            [
                'title' => 'Здравоохранение',
                'thumbnail' => 'images/idea-category/2024/01/24/xq00c7KZu0.svg',
            ],
            [
                'title' => 'Межнациональные отношения',
                'thumbnail' => 'images/idea-category/2024/01/24/8YR5lXi1XF.svg',
            ], 
            [
                'title' => 'Народная дипломатия',
                'thumbnail' => 'images/idea-category/2024/01/24/xusPMsDI3u.svg',
            ], 
        ];


        foreach($categories as $category){
            IdeaCategory::updateOrCreate(
                array_merge($category, ['content' => fake()->paragraph()])
            );
        }
    }
}