<?php

namespace Database\Seeders;

use Domain\User\Models\User;
use Domain\User\Models\Branch;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use MoonShine\Models\MoonshineUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Тест',
            'family' => 'Тест',
            'phone' => '79781107283',
            'birthday' => '2017-10-02',
            'email' => 'and1334@mail.ru',
            'password' => Hash::make('Aa12345678'),
        ]);

        UserFactory::new()->count(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['branch_id' => Branch::all()->random()],
            ))
            ->create();
    }
}
