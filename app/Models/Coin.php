<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coin extends Model
{
    protected $table = 'coin';
    const TABLE_COIN = 'coin';


    public static function getCoinIcon(){


        return DB::table(self::TABLE_COIN)->select('coin_icon','coin_symbol')->get();
    }
}
