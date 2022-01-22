<?php

namespace Database\Factories;

use App\Models\Scientist;
use App\Models\Star;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scientist_id'=> Scientist::factory(),
            'star_id'=> Star::factory(),
            'cognition'=> $this->faker->paragraph(),
            'date'=>$this->faker->date(),
            'new_star'=>$this->faker->boolean()
        ];
    }
}
