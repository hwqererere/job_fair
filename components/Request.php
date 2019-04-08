<?php


namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;


class Request extends Component
{
    /**
     * get获取值
     */
    public static function Get($value){
        if(isset($_GET[$value])){
            return urldecode($_GET[$value]);
        } else {
            return "";
        }
        
    }

     /**
     * post获取值
     */
    public static function Post($value){
        if(isset($_Post[$value])){
            return urldecode($_Post[$value]);
        }else{
            return "";
        }
       
    }
}
