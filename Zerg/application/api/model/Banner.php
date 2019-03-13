<?php
/**
 * Created by PhpStorm.
 * User: dongzhenzhen
 * Date: 2019-03-09
 * Time: 14:37
 */

namespace app\api\model;
use think\Db;
use think\Model;

class Banner extends Model
{
//在model中再也不需要定义基本的增删改查方法了
    //    public static function getBannerByID($id){
//        //$result = Db::query('select * from banner_item where banner_id=?',[$id]);
//        //return json_encode($result);
//    }
}