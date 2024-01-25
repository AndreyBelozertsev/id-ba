<?php

namespace Database\Seeders;

use Domain\User\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['title' => 'Школьник'], 
            ['title' => 'Студент'],  
            ['title' => 'Предприниматель'], 
            ['title' => 'Служащий'],   
            ['title' => 'Наемный работник'],
            ['title' => 'Пенсионер'],
            ['title' => 'Другое'],
        ];

        foreach($branches as $branch){
            Branch::updateOrCreate(
                $branch
            );
        }
    }
}
