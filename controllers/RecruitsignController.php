<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\components\Output;
use app\components\Request;
/**
 * 签到点信息
 */
class RecruitsignController extends \yii\web\Controller
{
    /**
     * 统计签到数申请一次加一次
     */
   private static $signCount = 0;

//    public static function getSignCount(){
//        if(self::$signCount == 0){
        
//        }
//    }

    public function actionIndex()
    {
        $id = Request::Get("userId");
        $model = User::findOne($id);
        if($model["sign"] === 1){
            Output::Code(400, "已经签到过，不能重复签到。", "warning");
        } else {
            // Yii::$app->db->createCommand()->update('user',['id' => $id, 'sign'=> 0])->execute();
            $model->sign = 1;
            if($model->save() > 0){
                return Output::Code(200, "签到成功。", "success");
            } else {
                return Output::Code(500, "签到失败，请重新再试。", "fail");
            }
          
        }
     
    }

    /**
     * 获取招聘会用户签到数量
     */
    public function actionCountSign() {
        $type = Request::Get("type");
        try{
            $count = User::find()->where(["sign"=> 1])->count();
             Output::setSign(10);
            if($type == 1){
               
                echo Output::getSign();
                $count =  $count + Output::getSign();
            }
           return Output::Code(200, $count, "success");
        }catch(Exception $e) {
            return Output::Code(500, "查询签到数量失败。", "fail");
        }
    }

}
