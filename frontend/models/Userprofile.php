<?php

namespace app\models;

use Yii;

class Userprofile extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'userprofile';
    }
	
	public function rules()
    {
        return [
            // [['user_id', 'TutorAboutPupil', 'PupilAboutTutor'], 'required'],
            [['user_id'], 'integer'],
        ];
    }
	public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
        ];
    }

    public static function getUserprofile($id)
	{
		$userprofile = Userprofile::findOne(['user_id' => $id,]);
		return $userprofile;
	}
	
}
