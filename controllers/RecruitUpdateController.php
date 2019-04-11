<?php

namespace app\controllers;
use app\models\RecruitInfo;
use app\components\Output;
use app\components\Request;
/**
 * 修改企业招聘信息
 */
class RecruitUpdateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = array(
            "id"=> Request::Get("id"),
            "unitName"=> Request::Get("unitName"),
            "jobName"=> Request::Get("jobName"),
            "mansize"=> Request::Get("mansize"),
            "age"=> Request::Get("age"),
            "record"=> Request::Get("record"),
            "pay"=> Request::Get("pay"),
            "jobrequirements"=> Request::Get("jobrequirements"),
            "workingplace"=> Request::Get("workingplace")
        );
        // id', 'unitName', 'jobName', 'mansize', 'age', 'record', 'pay', 'jobrequirements', 'workingplace'
        $model = RecruitInfo::findOne($data["id"]);
        if($data["unitName"])
        $model->unitName = $data["unitName"];
        if($data["jobName"])
        $model->jobName = $data["jobName"];
        if($data["mansize"])
        $model->mansize = $data["mansize"];
        if($data["age"])
        $model->age = $data["age"];
        if($data["record"])
        $model->record = $data["record"];
        if($data["pay"])
        $model->pay = $data["pay"];
        if($data["jobrequirements"])
        $model->jobrequirements = $data["jobrequirements"];
        if($data["workingplace"])
        $model->workingplace = $data["workingplace"];
        if($model->save() >0){
            return Output::Code(200, "修改成功。", "success");
        }else {
            return Output::Code(500, "修改失败。", "fail");
        }
       
    }

    /**
     * 创建企业招聘信息
     */
    public function actionSave()
    {
        $data = array(
            "id"=> Request::Get("id"),
            "unitName"=> Request::Get("unitName"),
            "jobName"=> Request::Get("jobName"),
            "mansize"=> Request::Get("mansize"),
            "age"=> Request::Get("age"),
            "record"=> Request::Get("record"),
            "pay"=> Request::Get("pay"),
            "jobrequirements"=> Request::Get("jobrequirements"),
            "workingplace"=> Request::Get("workingplace"),
            "company_id"=> Request::Get("company_id")
        );
        // id', 'unitName', 'jobName', 'mansize', 'age', 'record', 'pay', 'jobrequirements', 'workingplace'
        $model = new RecruitInfo;
        if($data["unitName"])
        $model->unitName = $data["unitName"];
        if($data["jobName"])
        $model->jobName = $data["jobName"];
        if($data["mansize"])
        $model->mansize = $data["mansize"];
        if($data["age"])
        $model->age = $data["age"];
        if($data["record"])
        $model->record = $data["record"];
        if($data["pay"])
        $model->pay = $data["pay"];
        if($data["jobrequirements"])
        $model->jobrequirements = $data["jobrequirements"];
        if($data["workingplace"])
        $model->workingplace = $data["workingplace"];
        if($data["company_id"])
        $model->company_id = $data["company_id"];
        if($model->save() >0){
            return Output::Code(200, "添加成功。", "success");
        }else {
            return Output::Code(500, "添加失败。", "fail");
        }
       
    }

}
