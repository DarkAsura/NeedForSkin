<?php

namespace Database\Seeders;
use App\Models\GameAccount;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::Create('ID_id');

        for($i = 1 ; $i <= 25;$i++){

            GameAccount::create([
                'UserID'=>$faker->numberBetween(1,20),
                'name'=>$faker->userName(),
                'image'=>$faker->imageUrl(),
                'describes'=>$faker->realText('40'),
                'price'=>$faker->numberBetween(10000,100000)
            ]);
        }
    }
}
