<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 01:17
 */

namespace app\api\validate;


use think\Exception;
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
            $error = $this->error;
            //throw new Exception($error);
        }
    }
}