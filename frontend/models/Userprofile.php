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
            [['TutorAboutPupil', 'PupilAboutTutor'], 'string'],
        ];
    }
	public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'TutorAboutPupil' => 'Tutor About Pupil',
            'PupilAboutTutor' => 'Pupil About Tutor',
        ];
    }

    public static function getUserprofile($id)
	{
		$userprofile = Userprofile::findOne(['user_id' => $id,]);
		return $userprofile;
	}
	
}
