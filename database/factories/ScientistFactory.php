<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScientistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(). ' '. $this->faker->lastName(),
            'email'=> $this->faker->unique()->email(),
            'password'=> $this->faker->password()
        ];
    }
}
