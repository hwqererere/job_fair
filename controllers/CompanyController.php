<?php

namespace app\controllers;
use app\components\Output;
use app\components\Request;
use app\components\Company;
use app\models\Resume;
/**
 * 企业类
 */
class CompanyController extends \yii\web\Controller
{
    public function init(){ $this->enableCsrfValidation = false; }

    /**
     * 查询企业列表
     */
    public function actionIndex()
    {
    
        $query=Company::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query
            ->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
           
        $recruit = [
            'countries' => $countries,
            'pagination' => $pagination,
        ];
    	if($recruit){
            
            return Output::Code(200, $recruit, "success");
    	}else{
            return Output::code(200, '', "success");
    	}
    }

    /**
     * 根据标示查询企业信息
     */
    public function  actionCompanyInfo(){
        $id = Request::Get("id");
        $data = Company::findeOne($id);
        return Output::Code(200, $data, "success");
    }

    /**
     * 创建企业信息
     */
    public function actionCreateCompany(){
        $model = new Company;
        $data =[            
            "name" => Request::Post("name"),
            "address" => Request::Post("address"),
            "phone_call" => Request::Post("phone_call"),
            "user_id" => Request::Post("user_id"),
            "remarks" => Request::Post("remarks")
        ];
        if($data["name"])
        $model->name = $data["name"];
        if($data["address"])
        $model->address = $data["address"];
        if($data["phone_call"])
        $model->phone_call = $redatas["phone_call"];
        if($data["user_id"])
        $model->user_id = $data["user_id"];
        if($data["remarks"])
        $model->remarks = $data["remarks"];
        if($model->save() > 0){
            return Output::Code(200, "创建成功。", "success");
        } else {
            return Output::Code(500, "创建失败。", "fail");
        }
      
    }

     /**
     * 修改企业信息
     */
    public function actionUpdateCompany(){
        
        $data =[        
            "id" => Request::Post("id"),    
            "name" => Request::Post("name"),
            "address" => Request::Post("address"),
            "phone_call" => Request::Post("phone_call"),
            "user_id" => Request::Post("user_id"),
            "remarks" => Request::Post("remarks")
        ];
        $model = Company::findOne($data["id"]);
        if($data["name"])
        $model->name = $data["name"];
        if($data["address"])
        $model->address = $data["address"];
        if($data["phone_call"])
        $model->phone_call = $redatas["phone_call"];
        if($data["user_id"])
        $model->user_id = $data["user_id"];
        if($data["remarks"])
        $model->remarks = $data["remarks"];
        if($model->save() > 0){
            return Output::Code(200, "修改成功。", "success");
        } else {
            return Output::Code(500, "修改失败。", "fail");
        }
     
    }
       /**
         * 修改企业绑定微信号
         */
        public function actionUpdateUserCompany(){
            $data =[        
                "id" => Request::Post("id"),    
                "user_id" => Request::Post("user_id")
            ];
            $model = Company::findOne($data["id"]);
            if($data["user_id"])
            $model->user_id = $data["user_id"];
   
            if($model->save() > 0){
                return Output::Code(200, "绑定成功。", "success");
            } else {
                return Output::Code(500, "绑定失败。", "fail");
            }
        }

        /**
         * 查询微信是否被企业或者个人邦迪
         */
        public function actionSelectBundling(){
            $user_id = Request::Get("user_id");
            $cdata = Company::find()->where(["user_id" => $user_id])->count();
            if($cdata > 0){
                return Output::Code(400, "当前微信已被企业绑定。", "warning");
            } else {
                //查询个人
                $rdata = Resume::find()->where(["userId" => $user_id])->count();
                if($rdata > 0){
                    return Output::Code(400, "当前微信已被个人绑定。", "warning");
                } else {
                    return Output::Code(200, "当前微信未被企业绑定。", "success");
                }
            }
        }

}
