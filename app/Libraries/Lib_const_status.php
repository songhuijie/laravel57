<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2018/10/10
 * Time: 上午11:21
 */
namespace App\Libraries;

class Lib_const_status{

    const CORRECT = 0;
    const ERROR = 1;


    const SUCCESS = 0;
    const SERVICE_ERROR = 1;


    //请求必要参数为空或者格式错误
    const ERROR_REQUEST_PARAMETER = 10;
    //请求过多,暂时被限制
    const ERROR_TOO_MUCH_REQUEST = 15;

    //用户注册邮箱已被使用
    const USER_ERROR_REG_FAIL = 10000;
    //用户登录账号或密码错误
    const USER_ERROR_LOGIN_FAIL = 10001;
    //用户不存在
    const USER_DOES_NOT_EXIST = 10002;
    //用户登录过期
    const USER_LOGIN_EXPIRED = 10003;
    //用户密码错误
    const USER_ERROR_PASSWORD_FAIL = 10004;
    //用户账号不存在
    const USER_ACCOUNT_NON_EXISTENT = 10005;
    //用户账号被锁定
    const USER_ACCOUNT_IS_LOCKED = 10006;
    //密码格式错误
    const USER_PASSWORD_FORMAT_ERROR = 10010;


    //FILE_ERROR_xxx
    //文件上传失败
    const FILE_ERROR_UPLOAD = 19000;
    //文件分组未找到
    const FILE_ERROR_SAVE_TYPE = 19001;
    //文件后缀限制
    const FILE_ERROR_DENY_EXT = 19100;
    //文件大小限制
    const FILE_ERROR_DENY_SIZE = 19101;
    //文件宽高限制
    const FILE_ERROR_DENY_W_H = 19102;



    //邮件发送失败
    const MAIL_FAILURE = 40000;
    //邮件已发送
    const MAIL_HAS_BEEN_SENT = 40001;
    //邮件尚未验证
    const MAIL_HAS_NOT_BEEN_VERIFIED = 40002;
    //邮箱验证码错误
    const MAIL_ERROR_VERIFICATION_CODE = 40003;
    //邮箱验证码超过验证错误
    const MAIL_ERROR_VERIFICATION_CODE_TIME = 40004;



    //PASSWORD_xxx
    //密码错误
    const PASSWORD_THE_SAME_NEW_PASSWORD = 50000;
    //两次密码不相同
    const PASSWORDS_TWO_ARE_NOT_THE_SAME = 50001;
}