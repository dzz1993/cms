<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 18:40
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    //定义http状态码code，具体的错误信息，自定义的错误码，并附上初始值,也可以不用,具体的exception会覆盖
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = '10000';
}