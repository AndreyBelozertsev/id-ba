<?php

namespace Database\Seeders;

use Domain\Idea\Models\Idea;
use Domain\User\Models\User;
use Domain\Place\Models\City;
use Illuminate\Database\Seeder;
use Database\Factories\IdeaFactory;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
       
        IdeaFactory::new()->count(50)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['user_id' => User::get()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['idea_category_id' => IdeaCategory::all()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['status' => collect(config('constant.status'))->keys()->random()],
            ))
            ->create()
            ->each(function ($idea) {
                $idea->cities()->sync(City::get()->random(3));
            });
    }
}
