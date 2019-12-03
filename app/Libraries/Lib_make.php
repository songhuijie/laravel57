<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2018/10/10
 * Time: 上午10:48
 */
namespace App\Libraries;

use App\Models\Guest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class Lib_make
{


    public static function initResponse()
    {
        $response_object = new \stdClass();
        $response_object->code = Lib_const_status::ERROR;
        $response_object->status = Lib_const_status::SERVICE_ERROR;
        $response_object->data = new \stdClass();
        return $response_object;
    }


    //发送邮件
    public static function SendMail($email, $name, $code)
    {

        $user = new \stdClass();
        $user->email = $email;
        $user->name = $name;

        return Mail::send('emails.sendcode', ['code' => $code], function ($m) use ($user) {
            $m->from('noreply@gmail.com', 'Verification Code');
            $m->to($user->email, $user->name)->subject('Register Code!');
        });
    }

    //处理验证码状态
    public static function VerifyCode($redis_key, $code)
    {

        $status = [

            'code_error' => -3,//验证码错误
            'max' => -2,//验证超出次数
            'expire' => -1,//超时,验证码过期
            'success' => 0, //成功
        ];

        $verifyCode = Redis::get($redis_key);

        if ($code != $verifyCode) {

            $errorTimes = Redis::incr(self::getErrorTime($redis_key));
            $result_int = $errorTimes;
            if ($errorTimes > 3 && !empty($code)) {
                Redis::del($redis_key);
                Redis::del(self::getErrorTime($redis_key));
                return $status['max'];//超过最大限度
            }


            Redis::del($redis_key);
            Redis::del(self::getErrorTime($redis_key));
            return $result_int;//验证码错误

        }


        return $status['success'];//验证成功

    }

    //生成 错误 次数的key
    public static function getErrorTime($redis_key)
    {
        return 'error:time:' . $redis_key;
    }

    //处理登录情况
    public static function GuestLogin($email, $password, $remember)
    {

        $guest = Guest::where(['email' => $email])->first();

        if (empty($guest)) {
            return Lib_const_status::USER_DOES_NOT_EXIST;
        } else {

            if ($guest->status == 0) {
                return Lib_const_status::MAIL_HAS_NOT_BEEN_VERIFIED;
            }

            if ($guest->password != md5($password)) {
                return Lib_const_status::USER_ERROR_PASSWORD_FAIL;
            } else {

                Cookie::queue('id', $guest->id);
                Cookie::queue('email', $guest->email);
                Cookie::queue('name', $guest->name);
                Cookie::queue('portrait', $guest->portrait);
                if ($remember == 'on') {
                    Session::put('id', $guest->id);
                    Session::put('email', $guest->email);
                    Session::put('name', $guest->name);
                    Session::put('portrait', $guest->portrait);
                }
                return Lib_const_status::SUCCESS;
            }

        }
    }


    // 用户cookie session
    public static function Guests()
    {

        $guest = new \stdClass();
        $id = Cookie::get('id');
        $email = Cookie::get('email');
        $name = Cookie::get('name');
        $portrait = Cookie::get('portrait');
        if (empty($id) || empty($email) || empty($name) || empty($portrait)) {

            if (empty(Session::get('id'))) {
                $guest->status = false;
            } else {
                $guest->status = true;
                $guest->id = Session::get('id');
                $guest->email = Session::get('email');
                $guest->name = Session::get('name');
                $guest->portrait = Session::get('portrait');
            }
        } else {
            $guest->status = true;
            $guest->id = $id;
            $guest->email = $email;
            $guest->name = $name;
            $guest->portrait = $portrait;
        }

        return $guest;

    }

    public static function curl_get($url, $referer ,$timeout = 10)
    {
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //禁止服务器端的验证
        //伪装请求来源，绕过防盗
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);//服务器5秒内没有响应，脚本就会断开连接
        $file_contents = curl_exec($ch);//运行curl
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $file_contents;
    }




    public static function str_replace_once($needle,$replace,$haystack) {


        $pos = strpos($haystack, $needle);

        if ($pos === false) {
            return $haystack;
        }
        return substr_replace($haystack, $replace, $pos, strlen($needle));
    }

}