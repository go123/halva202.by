<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $TutorAboutPupil
 * @property string $PupilAboutTutor
 */
class Testuserprofile extends \yii\db\ActiveRecord
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
            // [['user_id', 'TutorAboutPupil', 'PupilAboutTutor'], 'required'],
            [['user_id'], 'integer'],
            [['TutorAboutPupil', 'PupilAboutTutor'], 'string'],
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
            'TutorAboutPupil' => 'Tutor About Pupil',
            'PupilAboutTutor' => 'Pupil About Tutor',
        ];
    }
}
