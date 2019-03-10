<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-07
 * Time: 22:24
 */

namespace app\api\controller\v1;
use app\api\validate\IDMustBePositiveInt;
//引用model中的Banner类,由于有重名问题，最好use一个别名
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;

class Banner
{
    /*
     * 获取制定id的banner信息
     * @id banner的id号
     * @http GET
     * */
    public function getBanner($id){
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        //规范的抛出自定义异常，在控制器中只管抛
        if(!$banner){
            throw new BannerMissException();
        }
        //异常的抛出机制是，往上级抛，所有需要在这一步也捕获异常调用这个函数产生的异常，但没必要再往上抛了，直接返回定义的错误信息就行了
//        try{
//            $banner = BannerModel::getBannerByID($id);
//        }
//        catch(Exception $ex){
//            //当然了，在api中，不允许直接传数组，如果是数组，则需要json一下
//            $err = [
//                'error_code' => '10001',
//                'msg' => $ex->getMessage()
//            ];
//            return json($err,200);
//        }
        //抛给全局异常处理


        return $banner;

    }
}