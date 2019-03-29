<?php
//
namespace app\controllers;

use linslin\yii2\curl;
class CandidateController extends \yii\web\Controller
{
    public function actionSign()
    {
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
	    $response = $curl->get($authUrl);
	    echo $response;
    }

}
