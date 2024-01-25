<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Domain\User\Models\User;
use Domain\User\Models\Branch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\User\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;


    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::first(),
            'name' => fake()->firstName(),
            'family' => fake()->lastName(),
            'phone' => fake()->tollFreePhoneNumber(),
            'birthday' => fake()->dateTime(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
