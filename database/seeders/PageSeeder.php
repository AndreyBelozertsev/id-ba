<?php

namespace Database\Seeders;

use Domain\Page\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['title' => 'Политика обработки персональных данных'], 
            ['title' => 'Политика конфиденциальности'], 
            ['title' => 'Положение проекта'],   
            ['title' => 'О проекте'],        
        ];

        foreach($items as $item){
            Page::updateOrCreate(
                array_merge($item, ['content' => fake()->paragraph()])
            );
        }
    }
}
