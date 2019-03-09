<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 18:40
 */

namespace app\lib\exception;


use think\exception\Handle;

class BaseException extends Handle
{
    //定义状态码code，具体的错误信息，自定义的错误码，并附上初始值,具体的exception会覆盖
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = '10000';
}