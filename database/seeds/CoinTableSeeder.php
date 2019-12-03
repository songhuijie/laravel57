<?php

use Illuminate\Database\Seeder;

class CoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('coin')->delete();

        $array= [['coin_type' => 1,'coin_symbol' => 'USDT','coin_name' => 'USDT','uid' => 0,'touch' => 'admin','project' => 'admin','coin_icon' => 'https://et-storage.et.exchange/et-api/upcoins/0_1540894159.png','urls' => '','textarea' => '','contract' => '','total' => 100,'plan' => '','precision' => 1,'price' => '','link' => '','acceptance' => '','txid' => '0xd5c75bd2be97cd7d5e725b3f912358aa87765d3c089d3e1dc5c16485ad262bf8','tx_url' => 'https://omniexplorer.info/tx/','status' => 5,'addr_key' => 'btc','recharge_support' => 1,'withdraw_support' => 1,'trade_support' => 1,'withdraw_day_limit' => '350000','withdraw_least_number' => '1','withdraw_service_charge' => '0.1','config' => '1','addr_keep' => '1','contract_addr' => '','hw_short_alert' => '-1','parent_coin_name' => 'btc','parent_coin_type' => 4,'system_decimal' => 8,'decimal' => 8,'fail_reason' => 0,'check_pass_time' => 0],

            ['coin_type' => 2,'coin_symbol' => 'ET','coin_name' => 'ET','uid' => 0,'touch' => 'admin','project' => 'admin','coin_icon' => 'https://et-storage.et.exchange/et-api/upcoins/0_1540894135.png','urls' => '','textarea' => '','contract' => '','total' => 100,'plan' => '','precision' => 1,'price' => '','link' => '','acceptance' => '','txid' => '0xd5c75bd2be97cd7d5e725b3f912358aa87765d3c089d3e1dc5c16485ad262bf8','tx_url' => 'https://etherscan.io/tx/','status' => 5,'addr_key' => 'eth','recharge_support' => 1,'withdraw_support' => 1,'trade_support' => 1,'withdraw_day_limit' => '350000','withdraw_least_number' => '5','withdraw_service_charge' => '100','config' => '1','addr_keep' => '0','contract_addr' => '','hw_short_alert' => '-1','parent_coin_name' => 'eth','parent_coin_type' => 5,'system_decimal' => 8,'decimal' => 18,'fail_reason' => 0,'check_pass_time' => 0],


            ['coin_type' => 3,'coin_symbol' => 'GTC','coin_name' => 'GTC','uid' => 0,'touch' => 'admin','project' => 'admin','coin_icon' => 'https://et-storage.et.exchange/et-api/upcoins/0_1540894147.png','urls' => '','textarea' => '','contract' => '','total' => 100,'plan' => '','precision' => 1,'price' => '','link' => '','acceptance' => '','txid' => '0xd5c75bd2be97cd7d5e725b3f912358aa87765d3c089d3e1dc5c16485ad262bf8','tx_url' => 'https://etherscan.io/tx/','status' => 5,'addr_key' => 'eth','recharge_support' => 1,'withdraw_support' => 1,'trade_support' => 1,'withdraw_day_limit' => '100000','withdraw_least_number' => '1000','withdraw_service_charge' => '5','config' => '1','addr_keep' => '0','contract_addr' => '0xb70835d7822ebb9426b56543e391846c107bd32c','hw_short_alert' => '-1','parent_coin_name' => 'eth','parent_coin_type' => 5,'system_decimal' => 8,'decimal' => 18,'fail_reason' => 0,'check_pass_time' => 0],


            ['coin_type' => 4,'coin_symbol' => 'BTC','coin_name' => 'BTC','uid' => 0,'touch' => 'admin','project' => 'admin','coin_icon' => 'https://et-storage.et.exchange/et-api/upcoins/0_1540894091.png','urls' => '','textarea' => '','contract' => '','total' => 100,'plan' => '','precision' => 1,'price' => '','link' => '','acceptance' => '','txid' => '0xd5c75bd2be97cd7d5e725b3f912358aa87765d3c089d3e1dc5c16485ad262bf8','tx_url' => 'https://www.blockchain.com/zh-cn/btc/tx/','status' => 5,'addr_key' => 'btc','recharge_support' => 1,'withdraw_support' => 1,'trade_support' => 1,'withdraw_day_limit' => '2','withdraw_least_number' => '0.002','withdraw_service_charge' => '0.0005','config' => '1','addr_keep' => '1','contract_addr' => '','hw_short_alert' => '-1','parent_coin_name' => '','parent_coin_type' => '-1','system_decimal' => 8,'decimal' => 8,'fail_reason' => 0,'check_pass_time' => 0],


            ['coin_type' => 5,'coin_symbol' => 'ETH','coin_name' => 'ETH','uid' => 0,'touch' => 'admin','project' => 'admin','coin_icon' => 'https://et-storage.et.exchange/et-api/upcoins/0_1540894364.png','urls' => '','textarea' => '','contract' => '0xb70835d7822ebb9426b56543e391846c107bd32c','total' => 100,'plan' => '','precision' => 1,'price' => '','link' => '','acceptance' => '','txid' => '0xd5c75bd2be97cd7d5e725b3f912358aa87765d3c089d3e1dc5c16485ad262bf8','tx_url' => 'https://etherscan.io/tx/','status' => 5,'addr_key' => 'eth','recharge_support' => 1,'withdraw_support' => 1,'trade_support' => 1,'withdraw_day_limit' => '20','withdraw_least_number' => '0.02','withdraw_service_charge' => '0.005','config' => '1','addr_keep' => '0','contract_addr' => '','hw_short_alert' => '-1','parent_coin_name' => '','parent_coin_type' => '-1','system_decimal' => 8,'decimal' => 18,'fail_reason' => 0,'check_pass_time' => 0]];

        \App\Models\Coin::insert($array);
    }
}
