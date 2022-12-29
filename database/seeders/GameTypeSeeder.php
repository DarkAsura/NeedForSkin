<?php

namespace Database\Seeders;

use App\Models\GameType;
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
        for($i = 0;$i < 20;$i++){
            GameType::create([
                'GameType'=>$i%4+1,
                'GameAccountID'=> $i+1
            ]);
        }
    }
}
