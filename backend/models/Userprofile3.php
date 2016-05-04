<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $info
 * @property string $infoOnlyForMe
 * @property string $myOpinion
 * @property string $pupilOpinion
 *
 * @property User $user
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'info', 'infoOnlyForMe', 'myOpinion', 'pupilOpinion'], 'required'],
            [['user_id'], 'integer'],
            [['info', 'infoOnlyForMe', 'myOpinion', 'pupilOpinion'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'info' => 'Info',
            'infoOnlyForMe' => 'Info Only For Me',
            'myOpinion' => 'My Opinion',
            'pupilOpinion' => 'Pupil Opinion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
	
	public static function getUserprofile($id)
	{
		$userprofile = Userprofile::findOne(['user_id' => $id,]);
		// $userprofile = Userprofile::find()
         // ->where(['user_id'=>$id])->one();
		return $userprofile;
	}
}
