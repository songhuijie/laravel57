<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2018/10/10
 * Time: 下午1:45
 */
namespace App\Libraries;

class Lib_base{

    public static function getLogoImg(){

        return url('/img/blog/logo.png');
    }

    const SEND_CODE = 'send:code:%d';
}