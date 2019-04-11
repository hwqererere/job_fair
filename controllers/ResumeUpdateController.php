<?php

namespace app\controllers;
use app\models\Resume;
use app\models\LearningExperience;
use app\models\WorkExperience;
use app\components\Output;
use app\components\Request;
/**
 * 跟新简历信息
 */
class ResumeUpdateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        try{
            $res = array(
                "id" => Request::Get("id"),
                "postal_code" => Request::Get("postal_code"),
                "url_id" => Request::Get("url_id"),
                "username" => Request::Get("username"),
                "identitycard" => Request::Get("identitycard"),
                "education" => Request::Get("education"),
                "sex" => Request::Get("sex"),
                "age" => Request::Get("age"),
                "province" => Request::Get("province"),
                "city" => Request::Get("city"),
                "county" => Request::Get("county"),
                "place" => Request::Get("place"),
                "domicile" => Request::Get("domicile"),
                "phone" => Request::Get("phone"),
                "status" => Request::Get("status"),
                "remark" => Request::Get("remark"),
                "userId" => Request::Get("userId"),
                "resume_code" => Request::Get("resume_code"),
                "record_date" => Request::Get("record_date"),
                "nation" => Request::Get("nation"),
                "marital_status" => Request::Get("marital_status"),
                "home_phone" => Request::Get("home_phone"),
                "personnel_type" => Request::Get("personnel_type"),
                "technical_title" => Request::Get("technical_title"),
                "working_life" => Request::Get("working_life"),
                "strong_point" => Request::Get("strong_point"),
                "Job_intention" => Request::Get("Job_intention"),
                "expected_income" => Request::Get("expected_income"),
                "political_status" => Request::Get("political_status"),
                "street" => Request::Get("street"),
                "person_height" => Request::Get("person_height"),
                "weight" => Request::Get("weight")
            );
           
            $model = Resume::findOne($res["id"]);
           
            if($res["postal_code"])
            $model->postal_code = $res["postal_code"];
            if($res["url_id"])
            $model->url_id = $res["url_id"];
            if($res["username"])
            $model->username = $res["username"];
            if($res["sex"])
            $model->sex = $res["sex"];
            if($res["identitycard"])
            $model->identitycard = $res["identitycard"];
            if($res["education"])
            $model->education = $res["education"];
            if($res["age"])
            $model->age = $res["age"];
            if($res["province"])
            $model->province = $res["province"];
            if($res["city"])
            $model->city = $res["city"];
            if($res["county"])
            $model->county = $res["county"];
            if($res["place"])
            $model->place = $res["place"];
            if($res["domicile"])
            $model->domicile = $res["domicile"];
            if($res["phone"])
            $model->phone = $res["phone"];
            if($res["status"])
            $model->status = $res["status"];
            if($res["remark"])
            $model->remark = $res["remark"];
            if($res["userId"])
            $model->userId = $res["userId"];

            if($res["resume_code"])
            $model->resume_code = $res["resume_code"];
            if($res["record_date"])
            $model->record_date = $res["record_date"];
            if($res["nation"])
            $model->nation = $res["nation"];
            if($res["marital_status"])
            $model->marital_status = $res["marital_status"];
            if($res["home_phone"])
            $model->home_phone = $res["home_phone"];
            if($res["personnel_type"])
            $model->personnel_type = $res["personnel_type"];
            if($res["technical_title"])
            $model->technical_title = $res["technical_title"];
            if($res["working_life"])
            $model->working_life = $res["working_life"];
            if($res["strong_point"])
            $model->strong_point = $res["strong_point"];
            if($res["Job_intention"])
            $model->Job_intention = $res["Job_intention"];
            if($res["expected_income"])
            $model->expected_income = $res["expected_income"];
            if($res["political_status"])
            $model->political_status = $res["political_status"];
            if($res["street"])
            $model->street = $res["street"];
            if($res["person_height"])
            $model->person_height = $res["person_height"];
            if($res["weight"])
            $model->weight = $res["weight"];
            if($model->save()>0) {
             

            /**
             * This is the model class for table "learning_experience".
             *
             * @property int $id
             * @property string $start_date 入学时间
             * @property string $end_date 毕业时间
             * @property string $school_name 学校名称
             * @property string $major 专业
             * @property int $res_id 关联简历标示
             */
            // $leparr = array(
            //     "start_date" => Request::Get("start_date"),
            //     "end_date" => Request::Get("end_date"),
            //     "school_name" => Request::Get("school_name"),
            //     "major" => Request::Get("major")
            // );
            $leArray = json_decode(Request::Get("leparray_data", true));

            foreach($leArray as $leparr){
                //创建学习经历
                $this->updateLearning($leparr);
            }
             
                //创建工作经历
                /**
                 * This is the model class for table "work_experience".
                 *
                 * @property int $id
                 * @property string $start_date 开始时间
                 * @property string $end_date 结束时间
                 * @property string $corporate_name 公司名称
                 * @property string $work_name 岗位名称
                 * @property int $res_id 关联简历标示
                 */
                // $work = array(
                //     "start_date" => Request::Get("start_date"),
                //     "end_date" =>Request::Get("end_date"),
                //     "corporate_name" =>Request::Get("corporate_name"),
                //     "work_name" => Request::Get("work_name"),
                // );
                $workArray = json_decode(Request::Get("workarray_data", true));

                foreach($workArray as $work){
                    //创建学习经历
                    $this->updateWorkExperience($work);
                }
                 
               
                return Output::Code(200, "新增成功。", "success"); 
            } else {
                return Output::Code(500, "新增失败。", "fail");  
            }
        }catch(Exception $e){
            return Output::Code(-100, "新增失败", "error"); 
        }
      
    }

    /**
     * 创建学习经历
     */
    private function updateLearning($leparr){
        $lep = LearningExperience::findOne($leparr["id"]);
        if($leparr["start_date"])
        $lep->start_date = $leparr["start_date"];
        if($leparr["end_date"])
        $lep->end_date = $leparr["end_date"];
        if($leparr["school_name"])
        $lep->school_name = $leparr["school_name"];
        if($leparr["major"])
        $lep->major = $leparr["major"];
        $lep->save();
    }
    /**
     * 创建工作经历
     */
    private function updateWorkExperience($work){
        $works = WorkExperience::findOne($work["id"]);
        if($work["start_date"])
        $works->start_date = $work["start_date"];
        if($work["end_date"])
        $works->end_date = $work["end_date"];
        if($work["corporate_name"])
        $works->corporate_name = $work["corporate_name"];
        if($work["work_name"])
        $works->work_name = $work["work_name"];
        $works->save();
    }

}
