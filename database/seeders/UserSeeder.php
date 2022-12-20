<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker::create('id_ID');

    for($i=1;$i<=20;$i++){
        User::create([
            'name' =>$faker->name(),
            'email'=>$faker->safeEmail(),
            'password'=>$faker->password(5,20),
            'role'=>'Member'
        ]);
    };




    }
}
