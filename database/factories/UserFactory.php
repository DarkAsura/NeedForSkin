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
            'Name' =>fake()->name(),
            'Email'=>fake()->unique()->safeEmail(),
            'Password'=>fake()->password('$minLength = 5,$maxLength = 10')

        ];
    }
}
