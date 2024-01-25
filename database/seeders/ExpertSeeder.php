<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Expert\Models\Expert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experts = [
            [
                'family' => 'Аксёнов',
                'name' => ' Сергей',
                'patronymic' => 'Валерьевич',
                'position' => 'Глава Республики Крым'
            ], 
            [
                'family' => 'Куршутов',
                'name' => 'Альберт',
                'patronymic' => 'Абдурашитович',
                'position' => 'Временно исполняющий обязанности министра внутренней политики, информации и связи Республики Крым'
            ], 
            [
                'family' => 'Зинченко',
                'name' => 'Алексей',
                'patronymic' => 'Сергеевич',
                'position' => 'Председатель Государственного комитета молодежной политики Республики Крым'
            ], 
        ];


        foreach($experts as $expert){
            Expert::updateOrCreate(
                $expert
            );
        }
    }
}
