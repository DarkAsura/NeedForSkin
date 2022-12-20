<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->name(),
            'Email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'Password' => '',
            'remember_token' => Str::random(10),
        ];
    }
}
