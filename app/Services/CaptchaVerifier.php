<?php
namespace App\Services;
/**
 * 易盾验证码二次校验SDK
 *
 */
class CaptchaVerifier {
    const VERSION = 'v2';
    const API_TIMEOUT = 5;
    const API_URL = 'http://c.dun.163yun.com/api/v2/verify';
    /**
     * 构造函数
     * @param $captcha_id 验证码id
     * @param $secret_id 密钥对
     * @param $secret_key 密钥对
     */
    public function __construct($captcha_id, $secret_id, $secret_key) {
        $this->captcha_id  = $captcha_id;
        $this->secret_id = $secret_id;
        $this->secret_key = $secret_key;
    }

    /**
     * 发起二次校验请求
     * @param $validate 二次校验数据
     * @param $user 用户信息
     */
    public function verify($validate, $user = '') {
        $params = array();
        $params["captchaId"] = $this->captcha_id;
        $params["validate"] = $validate;
        $params["user"] = $user;
        // 公共参数
        $params["secretId"] = $this->secret_id;
        $params["version"] = self::VERSION;
        $params["timestamp"] = sprintf("%d", round(microtime(true)*1000));// time in milliseconds
        $params["nonce"] = sprintf("%d", rand()); // random int
        $params["signature"] = $this->sign($this->secret_key, $params);

        echo json_encode($params);
        $result = $this->send_http_request($params);
        return array_key_exists('result', $result) ? $result['result'] : false;
    }

    /**
     * 计算参数签名
     * @param $secret_key 密钥对key
     * @param $params 请求参数
     */
    private function sign($secret_key, $params){
        ksort($params); // 参数排序
        $buff="";
        foreach($params as $key=>$value){
            $buff .=$key;
            $buff .=$value;
        }
        $buff .= $secret_key;
        return md5($buff);
    }

    /**
     * 发送http请求
     * @param $params 请求参数
     */
    private function send_http_request($params){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::API_TIMEOUT);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::API_TIMEOUT);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        /*
         * Returns TRUE on success or FALSE on failure.
         * However, if the CURLOPT_RETURNTRANSFER option is set, it will return the result on success, FALSE on failure.
         */
        $result = curl_exec($ch);
        // var_dump($result);

        if(curl_errno($ch)){
            $msg = curl_error($ch);
            curl_close($ch);
            return array("error"=>500, "msg"=>$msg, "result"=>false);
        }else{
            curl_close($ch);
            return json_decode($result, true);
        }
    }
}