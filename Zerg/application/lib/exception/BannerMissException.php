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
    public $msg = "请求的banner不存在";//具体类中明确的制定错误的原因
    public $errorCode = '40000';//五位错误码，要有自己的编码体系，在原例中error_code.txt中给出一个较好的errorCode实例
}