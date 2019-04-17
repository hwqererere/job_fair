<?php

namespace app\controllers;
use app\models\Fuli;
use app\components\Output;
use app\components\Request;
class FuliController extends \yii\web\Controller
{
	public function init(){ $this->enableCsrfValidation = false; }
    public function actionIndex()
    {
    	$re=Fuli::find()->all();
    	 $result = array();
    	foreach($re as $keys){
    		$result[]=array(
    			'id'=>$keys['id'],
    			'fuli'=>$keys['fuli']
    		);
    	}
        return Output::Code(200, $result, "success");
    }

}
