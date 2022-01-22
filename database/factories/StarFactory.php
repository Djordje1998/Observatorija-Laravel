<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'system'=> $this->faker->title(),
            'spectral'=> $this->faker->colorName(),
            'size'=>$this->faker->name()
        ];
    }
}
