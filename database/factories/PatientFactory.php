<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->unique()->safeemail(),
            'contact'=>fake()->contact(),
            'sex'=>fake()->sex(),
            'age'=>fake()->age(),
            'test_required'=>fake()->test_required(),
            'test_date'=>now(),

        ];
    }
}
