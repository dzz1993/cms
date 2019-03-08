<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-07
 * Time: 22:24
 */

namespace app\api\controller\v1;
use app\api\controller\IDMustBePositiveInt;

class Banner
{
    /*
     * 获取制定id的banner信息
     * @id banner的id号
     * @http GET
     * */
    public function getBanner($id){
        $data = [
            'id'=> $id
        ];
        $validate = new IDMustBePositiveInt();
        $result=$validate->check($data);
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }
}