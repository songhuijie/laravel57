<?php

use Illuminate\Database\Seeder;

class TradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \Illuminate\Support\Facades\DB::table('trade')->delete();


        $array = [
            [
                'id'=>1,
                'symbol'=>'ET_USDT',
                'type'=>'[2, 1]',
                'decimal_price'=>12,
                'decimal_amount'=>8,
                'at_least_amount'=>'1.0000',
                'fee'=>'0.0010',
                'status'=>'0',
                're_seq'=>'0',
                'show'=>'1',
                'created_at'=>date('Y-m-d H:i:s')
            ],

            [
                'id'=>2,
                'symbol'=>'GTC_USDT',
                'type'=>'[3, 1]',
                'decimal_price'=>8,
                'decimal_amount'=>8,
                'at_least_amount'=>'1.0000',
                'fee'=>'0.0010',
                'status'=>'1',
                're_seq'=>'1',
                'show'=>'1',
                'created_at'=>date('Y-m-d H:i:s')
            ],

            [
                'id'=>3,
                'symbol'=>'BTC_USDT',
                'type'=>'[4, 1]',
                'decimal_price'=>8,
                'decimal_amount'=>8,
                'at_least_amount'=>'0.0010',
                'fee'=>'0.0010',
                'status'=>'1',
                're_seq'=>'2',
                'show'=>'1',
                'created_at'=>date('Y-m-d H:i:s')
            ],

            [
                'id'=>4,
                'symbol'=>'ETH_USDT',
                'type'=>'[5, 1]',
                'decimal_price'=>8,
                'decimal_amount'=>8,
                'at_least_amount'=>'0.0100',
                'fee'=>'0.0010',
                'status'=>'1',
                're_seq'=>'3',
                'show'=>'1',
                'created_at'=>date('Y-m-d H:i:s')
            ],
        ];

        \App\Models\Trades::insert($array);
    }
}
