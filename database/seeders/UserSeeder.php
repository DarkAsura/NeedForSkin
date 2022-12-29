<?php

namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'User0001',
            'email'=>'User0001@gmail.com',
            'password'=>Hash::make('User0001'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0002',
            'email'=>'User0002@gmail.com',
            'password'=>Hash::make('User0002'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0003',
            'email'=>'User0003@gmail.com',
            'password'=>Hash::make('User0003'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0004',
            'email'=>'User0004@gmail.com',
            'password'=>Hash::make('User0004'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0005',
            'email'=>'User0005@gmail.com',
            'password'=>Hash::make('User0005'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0006',
            'email'=>'User0006@gmail.com',
            'password'=>Hash::make('User0006'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0007',
            'email'=>'User0007@gmail.com',
            'password'=>Hash::make('User0007'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0008',
            'email'=>'User0008@gmail.com',
            'password'=>Hash::make('User0008'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0009',
            'email'=>'User0009@gmail.com',
            'password'=>Hash::make('User0009'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'User0010',
            'email'=>'User0010@gmail.com',
            'password'=>Hash::make('User0010'),
            'role'=>'Member'
        ]);
        User::create([
            'name' =>'Admin0001',
            'email'=>'Admin0001@gmail.com',
            'password'=>Hash::make('Admin0001'),
            'role'=>'Admin'
        ]);
    }
}
