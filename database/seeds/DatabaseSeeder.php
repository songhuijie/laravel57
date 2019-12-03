<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CoinTableSeeder::class);
        $this->call(TradeTableSeeder::class);
        $this->call(MarketListTableSeeder::class);
        $this->command->info('Coin table seeded!');
    }
}
