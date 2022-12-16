<?php

namespace Database\Seeders;

use App\Models\Player;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        $faker     = Factory::create();
        $positions = ['defender', 'midfielder', 'forward'];

        for($i = 0; $i < 50; $i++)
        {
            Player::create([
                'name' => $faker->name,
                'position' => $faker->randomElement($positions),
            ]);
        }

        $this->command->info(" Player has created successfully");
    }
}
