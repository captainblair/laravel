<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name'     => $this->faker->name(),
            'email'         => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->date(),
        ];
    }
}
