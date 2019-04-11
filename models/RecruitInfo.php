<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recruitInfo".
 *
 * @property int $id
 * @property string $unitName
 * @property string $jobName
 * @property int $mansize
 * @property int $age
 * @property string $record
 * @property int $pay
 * @property string $jobrequirements
 * @property string $workingplace
 */
class RecruitInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruitInfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unitName', 'jobName', 'mansize', 'age', 'record', 'pay', 'jobrequirements', 'workingplace'], 'required'],
            [['id', 'mansize', 'age', 'pay'], 'integer'],
            [['unitName', 'jobName'], 'string', 'max' => 100],
            [['record'], 'string', 'max' => 50],
            [['jobrequirements'], 'string', 'max' => 500],
            [['workingplace'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unitName' => 'Unit Name',
            'jobName' => 'Job Name',
            'mansize' => 'Mansize',
            'age' => 'Age',
            'record' => 'Record',
            'pay' => 'Pay',
            'jobrequirements' => 'Jobrequirements',
            'workingplace' => 'Workingplace',
        ];
    }

    public  static function selectRecruitInfo($job_name){
        //查
        // $sql = "SELECT * FROM recruitInfo where 1=1 ";
        if($job_name){
            return static::find()->
            where(['jobName' => $job_name])->
            all();
        } 
        return static::find()->asArray()->all();
    }
}
