<?php

use Illuminate\Database\Seeder;

class MarketListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \Illuminate\Support\Facades\DB::table('market_list')->delete();
        $array = [
            ['id'=>1,'symbol'=>'USDT','status'=>'1','coin_type'=>'1'],
            ['id'=>2,'symbol'=>'ETH','status'=>'0','coin_type'=>'5'],
            ['id'=>3,'symbol'=>'GTC','status'=>'0','coin_type'=>'3'],
            ['id'=>4,'symbol'=>'ET','status'=>'1','coin_type'=>'2'],

        ];

        \App\Models\MarketList::insert($array);
    }
}
