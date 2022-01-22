<?php

namespace Database\Seeders;

use App\Models\Observation;
use App\Models\Scientist;
use App\Models\Star;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Observation::truncate();
        Scientist::truncate();
        Star::truncate();
        
        Scientist::factory(2)->create();
        Star::factory(2)->create();

        $sc1 = Scientist::factory()->create();
        $sc2 = Scientist::factory()->create();
        $star1 = Star::factory()->create();
        $star2 = Star::factory()->create();

        Observation::factory()->create([
            'star_id'=>$star1->id,
            'scientist_id'=>$sc1->id
        ]);

        Observation::factory()->create([
            'star_id'=>$star2->id,
            'scientist_id'=>$sc2->id
        ]);

        Observation::factory()->create([
            'star_id'=>$star1->id,
            'scientist_id'=>$sc2->id
        ]);

        Observation::factory()->create([
            'star_id'=>$star2->id,
            'scientist_id'=>$sc1->id
        ]);
    }
}
