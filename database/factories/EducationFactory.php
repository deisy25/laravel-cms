<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instituteName' => $this->faker->sentence,
            'program' => $this->faker->sentence,
            'startDate' => $this->faker->date,
            'endDate' => $this->faker->date,
        ];
    }
}