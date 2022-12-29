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

        for($i = 0;$i < 20;$i++){
                if($i%4+1== 1){
                    GameAccount::create([
                        'UserID'=>$i%10+1,
                        'name'=>$faker->userName(),
                        'image'=>'https://drive.google.com/thumbnail?id=1lLAsBFzOGSTNtnjcuoLWVvpOv59kpluY',
                        'describes'=>$faker->realText('40'),
                        'price'=>$faker->numberBetween(10000,100000)
                        ]);
                }else if($i%4+1 == 2){
                    GameAccount::create([
                        'UserID'=>$i%10+1,
                        'name'=>$faker->userName(),
                        'image'=>'https://drive.google.com/thumbnail?id=13iynboeEGsz3H5SjYTkrmRhIo6P146zB',
                        'describes'=>$faker->realText('40'),
                        'price'=>$faker->numberBetween(10000,100000)
                        ]);
                }else if($i%4+1 == 3){
                    GameAccount::create([
                        'UserID'=>$i%10+1,
                        'name'=>$faker->userName(),
                        'image'=>'https://drive.google.com/thumbnail?id=1IbgX7_8dPuDisxjfk5EEqPV6dncAI-s3',
                        'describes'=>$faker->realText('40'),
                        'price'=>$faker->numberBetween(10000,100000)
                        ]);
                }else if ($i%4+1 == 4){
                    GameAccount::create([
                        'UserID'=>$i%10+1,
                        'name'=>$faker->userName(),
                        'image'=>'https://drive.google.com/thumbnail?id=1S9vWjzfP6L-zXa3gyAPIM3DIC-jtzt3k',
                        'describes'=>$faker->realText('40'),
                        'price'=>$faker->numberBetween(10000,100000)
                        ]);
                }else{
                    GameAccount::create([
                        'UserID'=>$i%10+1,
                        'name'=>$faker->userName(),
                        'image'=>'https://drive.google.com/thumbnail?id=1UIDGVYdMqdFj-BOlS9vRZPBUPzNuKqxF',
                        'describes'=>$faker->realText('40'),
                        'price'=>$faker->numberBetween(10000,100000)
                        ]);
                }
        }
    }
}
