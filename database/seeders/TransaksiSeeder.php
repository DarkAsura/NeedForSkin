<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("ID_id");
        Transaksi::create([
            'GameAccountID'=>$faker->numberBetween(1,10),
            'Method'=>$faker->randomElement(['Gopay','Dana','Ovo']),
            'UserID'=>$faker->numberBetween(1,20)

        ]);
    }
}
