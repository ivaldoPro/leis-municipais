<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => '$2a$12$UHn1aKCo0mb6nUxSS9BgP.q0i4ZBkt/GNhWqkErHPfFtWBTdHsjBq',
            'status' => 1,
            'perfil' => 1
        ];
    }
}