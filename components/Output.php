<?php


namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;


class Output extends Component
{

    public function Code($code,$data,$msg)
    {
        $arr=array(
            'code'=>$code,
            'data'=>$data,
            'msg'=>$msg
        );

        echo json_encode($arr);
    }
    public function Test(){
        echo "success";
    }
}
