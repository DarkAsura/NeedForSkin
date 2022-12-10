<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name'=>'Valorant'
        ]);
        DB::table('types')->insert([
            'name'=>'Genshin Impact'
        ]);
        DB::table('types')->insert([
            'name'=>'DOTA 2'
        ]);
        DB::table('types')->insert([
            'name'=>'CSGO'
        ]);



    }
}
