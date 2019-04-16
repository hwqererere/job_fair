<?php

namespace app\controllers;
use app\models\DeliveryInfo;
use app\components\Output;
use Yii;
/**
 * 简历投递信息查询
 */
class DeliveryInfoSelectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $userId = $_GET["userId"];
        $rid= $_GET["recruitId"];
        $del = DeliveryInfo:: find()->where(["user_id"=> $userId, "recruit_id"=>$rid])->count();
        // $result = array();
        // if($del){
        //     foreach($del as $key){
        //         $map['id']=$keys->id;
        //         $map['resume_id']=$keys->resume_id;
        //         $map['recruit_id']=$keys->recruit_id;
        //         $map['create_time']=$keys->create_time;
        //         $map['status']=$keys->status;
        //         $map['user_id']=$keys->user_id;
        //         array_push($result,$map);
        //     }
        // }
        Output::Code(200, $del, "success");
    }


    /**
     * 查询排队数量
     */
    public function actionCount(){
        $uid= $_GET["userId"];
        $rid= $_GET["recruitId"];
        $data = DeliveryInfo:: find()->where(["in","status",[1,3,4]])->andWhere(["recruit_id"=> $rid])->orderBy(["create_time"=>"asc"])->all();
        $count = 0;
        $result = array();
        if($data){
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->status == 3){
                    $count++;
                }
                if($data[$i]->user_id == $uid){
                    $map["order"] = $i +1;
                    $map["count"] =  $count;
                    array_push($result, $map);
                    break;
                }
            }
        }
        Output::Code(200, $result, "success");
    }

    /**
     * 查询录用
     */
    public function actionHireCount(){
        $rid= $_GET["recruitId"];
        $data = DeliveryInfo:: find()->where(["status"=> 4,"recruit_id"=> $rid])->count();
        Output::Code(200, $data, "success");
    }

    /**
     * 获取企业投递人数
     */
    public function actionRecruitCount(){
        $rid= $_GET["recruitId"];
        $data = DeliveryInfo:: find()->where(["recruit_id"=> $rid])->count();
        Output::Code(200, $data, "success");
    }

      /**
     * 获取人投递的企业
     */
    public function actionAllCount(){
         $userId = $_GET["userId"];
        $data = DeliveryInfo:: find()->where(["user_id"=> $userId])->groupBy("recruit_id")->count();
        Output::Code(200, $data, "success");
    }

/**
     * 根据岗位信息修改用户录用状态
     */
    public function actionUpdataResumeStaus(){
        $resId = Request::Get("resId");
        $userId = Request::Get("userId");
        $status = (int)Request::Get("status");
        $data = DeliveryInfo:: find()->where(["user_id"=> $userId, "recruit_id"=> $resId])->all();
        if($data){
            foreach($data as $key) {
                $keys->status = $status;
                $keys->save();
            }
        }
        Output::Code(200, "修改成功。", "success");
        
    }
   
}
