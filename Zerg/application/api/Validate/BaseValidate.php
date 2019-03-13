<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 01:17
 */

namespace app\api\validate;


use app\lib\exception\CheckFailException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取request实例，获取传入所有参数数组
        $request = Request::instance();
        $param = $request->param();
        $result=$this->check($param);
        if($result){
            return true;
        }
        else{
            //这种并不能直接知道到底异常是什么，只能笼统的知道是参数错误
            //throw new CheckFailException();
            $e =  new CheckFailException();
            //取验证器中的错误信息error，每一个rule条件的false都返回一个定义的false信息，存在error中
            $e->msg = $this->error;
            throw $e;
        }
    }
}