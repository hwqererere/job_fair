<?php
//
namespace app\controllers;

use Yii;
use linslin\yii2\curl;
use app\models\User;
class CandidateController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	if(isset($_GET["code"]) && isset($_GET["rawData"]) && isset($_GET["signature"]) && isset($_GET["encryptedData"]) && isset($_GET["iv"])){
    		$wxdata=array(
				"code"=>$_GET["code"],
				"rawData"=>$_GET["rawData"],
				"signature"=>$_GET["signature"],
				"encryptedData"=>$_GET["encryptedData"],
				"iv"=>$_GET["iv"]
			);
			       
	       	$url='https://api.weixin.qq.com/sns/jscode2session?appid=wxb75642b42cc5707f&secret=d637acdfd6e4e98d884571c9276fec86&js_code='.$wxdata['code'].'&grant_type=authorization_code';
		    $curl = new curl\Curl();
		    
		    // $response = $curl->reset()->setOption(
		    //     CURLOPT_POSTFIELDS,
		    //     http_build_query(array(
		    //             'text' => $value
		    //         )
		    //     ))->post($url);
		    // return $curl->response;
		    //get
		    
		    // $curl = new Curl();
		    $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);
		    $response = $curl->get($url);
		    $usermsg=json_decode($response);
		    
		    $check=User::find()->where(['openid' => $usermsg->openid])->one();

	    	if($check){
	    		//已存在
	    		$out=array(
						'openid'=>$usermsg->openid,
						'linktype'=>$check->type//跳转目标
				);
	    		Yii::$app->Output->Code(200,$out,"success");
	    	}else{
	    		//不存在，执行插入动作
	    		$model = new User;
				$model->openid = $usermsg->openid;
				$model->session_key  = $usermsg->session_key;
				$model->type  = $_GET['signtype'];				
				if($model->save() > 0){
					$out=array(
						'openid'=>$usermsg->openid,
						'linktype'=>$_GET['signtype']//跳转目标
					);
					Yii::$app->Output->Code(200,$out,"success");
				}else{
					Yii::$app->Output->Code(500,$out,"fail");
				}

	    	}
    	}else{
    		Yii::$app->Output->test();
    	}
    	
    	
    }

}
