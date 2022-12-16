<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\PlayerSkill;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PlayerSkillsSeeder extends Seeder
{
    public function run()
    {
        $faker     = Factory::create();
        $skills    = ['defense', 'attack', 'speed', 'strength', 'stamina'];
        $players   = Player::pluck('id');

        for($i = 0; $i < 50; $i++)
        {
            PlayerSkill::create([
                'value' =>  $faker->unique()->numberBetween(10,100),
                'skill' => $faker->randomElement($skills),
                'player_id' => $faker->randomElement($players),
            ]);
        }

        $this->command->info(" Player Skills has created successfully");
    }
}
