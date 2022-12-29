<?php

namespace Database\Seeders;

use App\Models\Type;
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
        Type::create([
            'name'=>'Valorant'
        ]);
        Type::create([
            'name'=>'Genshin Impact'
        ]);
        Type::create([
            'name'=>'DOTA 2'
        ]);
        Type::create([
            'name'=>'CSGO'
        ]);
    }
}
