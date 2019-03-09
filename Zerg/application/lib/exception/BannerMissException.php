<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 21:10
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = "请求的banner不存在";
    public $errorCode = '10001';
}