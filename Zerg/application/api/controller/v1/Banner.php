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
        $banner = BannerModel::get($id);
        //$banner = BannerModel::getBannerByID($id);
        //规范的抛出自定义异常，在控制器中只管抛
        if(!$banner){
            throw new BannerMissException();
        }



        return $banner;

    }
}