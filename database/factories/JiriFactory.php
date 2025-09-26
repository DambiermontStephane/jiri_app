<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JiriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'date' => fake()->date(),
            'description' => fake()->optional()->text(),
        ];

    }
    public function withoutName(): JiriFactory
    {
        return $this->state(function (array $attribute) {
            return [
                'name' => null
            ];
        });
    }
    public function withoutDate(): JiriFactory
    {
        return $this->state(function (array $attribute) {
            return [
                'date' => null
            ];
        });
    }
    public function withInvalidDate(): JiriFactory
    {
        return $this->state(function (array $attribute) {
            return [
                'date' => 'toto'
            ];
        });
    }
}
