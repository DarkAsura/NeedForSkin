<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ID_id');

        for($i = 1;$i <= 20;$i++){
            DB::table('game_types')->insert([
               'GameType'=>$faker->numberBetween(1,4),
                'GameAccountID'=> $i
            ]);
        }
    }
}
