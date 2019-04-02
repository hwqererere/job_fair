<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $openid
 * @property string $session_key
 * @property int $type 0,企业。1.个人.2.企业注销
 * @property int $sign 0.未签到。1.签到
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['openid', 'session_key', 'type'], 'required'],
            [['type', 'sign'], 'integer'],
            [['openid', 'session_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'session_key' => 'Session Key',
            'type' => 'Type',
            'sign' => 'Sign',
        ];
    }
}
