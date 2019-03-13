<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 17:54
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\File;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //还需要返回客户端当前请求的URL
    //在该类下写方法覆盖全局异常处理类Handle中的方法
    public function render(Exception $e)
    {
        //return parent::render($e);
        //不管怎么处理，最后返回的是json结构，否则报错
        //根据异常的两种分类，进行处理，要么记录日志，要么返回消息
        //如何区分异常是哪一类？这就是为什么要写BaseException类，这一类是需要向用户返回信息的类，凡是属于BaseException类的都是用户层面的异常
        //判断由框架传入的类是不是属于BaseException
        if($e instanceof BaseException){
            //需要返回具体的消息,直接从传过来的类里面取就行了
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;

        }
        else{
            //加一个开关，如果是给客户端，就返回自定义，如果是后台就返回系统的，也就是Handle中的
            if(config("app_debug")){
                return parent::render($e);
            }
            else{
                //不需要让用户知道具体错误
                $this->code = 500;
                $this->msg = "服务器内部错误";
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        //获取当前请求的url,这种东西就应该想到tp自带的request类,它的下面有个url方法
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'errorCode' => $this->errorCode,
            'URL' => $request->url()
        ];
        return json($result,$this->code);
    }
    //写日志方法
    private function recordErrorLog(Exception $e){
        //开启日志init方法
        Log::init([
            'type' => 'File',
            'path' => 'LOG_PATH',
            'level' => ['error']//定义只记录error基本的日志

        ]);
        //第一个参数，直接调抛出的异常信息，第二参数，日志级别，可以自定义，在TP5日志级别中也有规范
        Log::record($e->getMessage(),'error');
    }
}