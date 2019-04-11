<?php

namespace app\controllers;
use app\models\RecruitInfo;
use app\components\Output;
use app\components\Request;
use Yii;
use yii\data\Pagination;
/**
 * 查询企业岗位信息
 */
class RecruitInfoSelectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // return $this->render('index');
        //查
        // $sql = "SELECT * FROM RecruitInfo";
        $value = Request::Get("jobName");
        $recruit;
        $query=RecruitInfo::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
         if($value){
            $query->where(['jobName' => $value]);
        }
        $countries = $query
            ->orderBy('jobName')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
           
        $recruit = [
            'countries' => $countries,
            'pagination' => $pagination,
        ];
        //跳转到对应试图页面
        // $this->render('index', [
        //     'countries' => $countries,
        //     'pagination' => $pagination,
        // ]);
    	if($recruit){
        //     foreach($recruit as $keys){
        //             $map['id']=$keys->id;
        //             $map['unitName']=$keys->unitName;
        //             $map['jobName']=$keys->jobName;
        //             $map['mansize']=$keys->mansize;
        //             $map['age']=$keys->age;
        //             $map['record']=$keys->record;
        //             $map['pay']=$keys->pay;
        //             $map['jobrequirements']=$keys->jobrequirements;
        //             $map['workingplace']=$keys->workingplace;
        //             array_push($result,$map);
        //     }
            
            return Output::Code(200, $recruit, "success");
    	}else{
            return Output::code(200, '', "success");
    	}
    }

}
