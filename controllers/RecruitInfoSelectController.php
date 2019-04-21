<?php

namespace app\controllers;
use app\models\RecruitInfo;
use app\models\CompanyFuli;
use app\models\Company;
use app\models\Street;
use app\models\JobInfo;
use app\components\Output;
use app\components\Request;
use Yii;
use yii\data\Pagination;
/**
 * 查询企业岗位信息
 */
class RecruitInfoSelectController extends \yii\web\Controller
{
    public function init(){
        $this->enableCsrfValidation = false;
    }

    public function actionIndex()
    {
        // return $this->render('index');
        //查
        // $sql = "SELECT * FROM RecruitInfo";
        $value = Request::Get("jobName");
        $fuli = Request::Get("fuli");
        $street= Request::Get("street");
        $jobId =  Request::Get("jobId");

        $sql = "SELECT r. * , ff. fuli,ff.id as fid , cm. id as cid, cm.name,cm.address,cm.phone_call,cm.user_id,cm.remarks,cm.street_id , s.id as ssid, s.street_name FROM recruitInfo r LEFT JOIN (SELECT GROUP_CONCAT( fu.fuli SEPARATOR  ';' ) AS fuli, fu.company_id, GROUP_CONCAT( fu.id SEPARATOR  ',' ) AS id FROM ( SELECT l.fuli, f.company_id, l.id FROM fuli l LEFT JOIN company_fuli f ON l.id = f.fuli_id )fu GROUP BY fu.company_id )ff ON r.company_id = ff.company_id LEFT JOIN company cm ON cm.id = r.company_id LEFT JOIN jobInfo j ON r.job_id = j.id LEFT JOIN street s ON s.id = cm.street_id left join company_fuli cf on r.company_id = cf.company_id ";
         

            
        // find()->select(["c.*","r.*","s.*","j.job_name","j.id"]);

       
         if($value){

            $sql=$sql."where r.jobName in (".$value.")";
            // $query->where(['in','r.jobName', $value]);

            //福利
            if($fuli){
                $sql= $sql." and cf.fuli_id in (".$fuli.")";
                // $query->andWhere(['in','f.fuli_id' , $fuli]);
            }
            //街道
            if($street){
                $sql= $sql." and cm.street_id in (".$street.")";
                // $query->andWhere(['in','cm.street_id' ,$street]);
            }
            //岗位类型
            if($jobId){
                $sql= $sql." and r.job_id in (".$jobId.")";
                // $query->andWhere(['in','r.job_id' ,$jobId]);
            }
        }elseif($fuli){
            $sql= $sql." where cf.fuli_id in (".$fuli.")";
            // $query->where(['in','f.fuli_id', $fuli]);
            if($street){
                $sql= $sql." and cm.street_id in (".$street.")";
                // $query->andWhere(['in','cm.street_id' , $street]);
            }
             //岗位类型
             if($jobId){
                $sql= $sql." and r.job_id in (".$jobId.")";
                // $query->andWhere(['in','r.job_id', $jobId]);
            }
        }elseif($street){
            $sql=$sql." where cm.street_id in (".$street.")";
            // $query->where(['in', 'cm.street_id', $street]);
             //岗位类型
             if($jobId){
                $sql=$sql." and r.job_id in (".$jobId.")";
                // $query->andWhere(['in','r.job_id', $jobId]);
            }
        }elseif($jobId){//岗位类型
            $sql=$sql." where r.job_id in (".$jobId.")";
            // $query->where(['in','r.job_id' ,$jobId]);
        }
        $sql=$sql." group by r.id";
        // $query->groupBy("group by r.id");
        $query=RecruitInfo::findBySql($sql);
        // WHERE cf.fuli_id in(5)
        // group by r.id
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $countries = $query
            // ->leftJoin(Company::tableName()." c", "c.id=r.company_id")
            // ->leftJoin(CompanyFuli::tableName(). " f", "c.id=f.company_id")
            // ->leftJoin(Street::tableName(). " s", "c.street_id=s.id")
            // ->leftJoin(JobInfo::tableName(). " j", "r.job_id=j.id")
            ->orderBy('r.jobName')
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
