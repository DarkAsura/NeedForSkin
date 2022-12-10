<?php

namespace Database\Seeders;

use App\Models\GameAccount;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GameAccountSeeder::class,
            TypeSeeder::class,
            GameTypeSeeder::class,
            TransaksiSeeder::class,
            TransaksiHistorySeeder::class,
            ]);
    }
}
