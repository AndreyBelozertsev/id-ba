<?php

namespace Database\Seeders;

use Domain\Place\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'title' => 'Республика Крым'
            ], 
            [
                'title' => 'Алушта',
                'city_id' => 1
            ],  
            [
                'title' => 'Армянск',
                'city_id' => 1
            ], 
            [
                'title' => 'Бахчисарай',
                'city_id' => 1
            ],   
            [
                'title' => 'Бахчисарайский район',
                'city_id' => 1
            ],
            [
                'title' => 'Белогорск',
                'city_id' => 1
            ],
            [
                'title' => 'Белогорский район',
                'city_id' => 1
            ],
            [
                'title' => 'Джанкой',
                'city_id' => 1
            ],
            [
                'title' => 'Джанкойский район',
                'city_id' => 1
            ],
            [
                'title' => 'Евпатория',
                'city_id' => 1
            ],
            [
                'title' => 'Керчь',
                'city_id' => 1
            ],
            [
                'title' => 'Кировский район',
                'city_id' => 1
            ],
            [
                'title' => 'Красногвардейский район',
                'city_id' => 1
            ],
            [
                'title' => 'Красноперекопск',
                'city_id' => 1
            ],
            [
                'title' => 'Красноперекопский район',
                'city_id' => 1
            ],
            [
                'title' => 'Ленинский район',
                'city_id' => 1
            ],
            [
                'title' => 'Нижнегорский район',
                'city_id' => 1
            ],
            [
                'title' => 'Первомайский райн',
                'city_id' => 1
            ],
            [
                'title' => 'Раздольненский район',
                'city_id' => 1
            ],
            [
                'title' => 'Саки',
                'city_id' => 1
            ],
            [
                'title' => 'Сакский район',
                'city_id' => 1
            ],
            [
                'title' => 'Симферополь',
                'city_id' => 1
            ],
            [
                'title' => 'Симферопольский район',
                'city_id' => 1
            ],
            [
                'title' => 'Советский район',
                'city_id' => 1
            ],
            [
                'title' => 'Судак',
                'city_id' => 1
            ],
            [
                'title' => 'Феодосия',
                'city_id' => 1
            ],
            [
                'title' => 'Черноморский район',
                'city_id' => 1],
            [
                'title' => 'Ялта',
                'city_id' => 1
            ],
            [
                'title' => 'Другое'
            ],
        ];

        foreach($cities as $city){
            City::updateOrCreate(
                $city
            );
        }
    }
}
