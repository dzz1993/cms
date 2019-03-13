<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-12
 * Time: 20:32
 */

namespace app\lib\exception;


class CheckFailException extends BaseException
{
    public $code = 404;
    public $msg = "参数未通过校验";//具体类中明确的制定错误的原因
    public $errorCode = '10000';//五位错误码，要有自己的编码体系，在原例中error_code.txt中给出一个较好的errorCode实例
}