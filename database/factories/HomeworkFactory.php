<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'note' => fake()->randomDigit()
        ];
    }
}
