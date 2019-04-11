<?php

namespace app\controllers;
use app\models\Demo;
use app\models\User;
class DemoController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	//查
    	$d=Demo::findBySql('SELECT * FROM Demo')->all();
    	if($d){
    		foreach ($d as $key ) {
    			echo $key->id."\n";
    			echo $key->keya."\n";
    		}
    	}else{
    		echo "没有数据";
    	}

    }

    public function actionAdd(){
   
    	$model = new Demo;
		$model->keya = 'aaa';
		$model->keyb  = 'bbb';
		$model->keyc  = 'ccc';
		$model->keyd  = 'ddd';
		if($model->save() > 0){echo "添加成功";echo ",id=".$model->id; }else{echo "添加失败"; } //id自增长，不需要写
    }

    public function actionEdit(){
    	$model = User::findOne(1);//id
		$model->sign = '2';
		$model->save(); 
    }

    public function actionDel(){
    	$count= Demo::model()->deleteAll('username=:name and password=:pass',array(':name'=>'这里填东西',':pass'=>'这里填东西'));
    	if($count>0){echo"删除成功"; }else{echo "删除失败"; } 
    }


}
