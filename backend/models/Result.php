<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $comment_TutorAboutPupil1
 * @property integer $mark_TutorAboutPupil1
 * @property string $date_TutorAboutPupil1
 * @property string $comment_Pupil1AboutTutor
 * @property integer $mark_Pupil1AboutTutor
 * @property string $date_Pupil1AboutTutor
 * @property string $commentMaximum_TutorAboutPupil1
 * @property integer $markMaximum_TutorAboutPupil1
 * @property string $dateMaximum_TutorAboutPupil1
 * @property string $commentMaximum_Pupil1AboutTutor
 * @property integer $markMaximum_Pupil1AboutTutor
 * @property string $dateMaximum_Pupil1AboutTutor
 * @property string $comment_Pupil1AboutPupil1
 * @property integer $mark_Pupil1AboutPupil1
 * @property string $date_Pupil1AboutPupil1
 * @property string $commentMaximum_Pupil1AboutPupil1
 * @property integer $markMaximum_Pupil1AboutPupil1
 * @property string $dateMaximum_Pupil1AboutPupil1
 * @property integer $moderationPupil1
 *
 * @property Content $content
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
		$idUser=$_SESSION['idRequireUser'];
        return [
            
			// 
			// [
				// [
					// 'content_id', 
					
					// 'comment_TutorAboutPupil1', 
					// 'mark_TutorAboutPupil1', 
					// 'date_TutorAboutPupil1', 
					// 'commentMaximum_TutorAboutPupil1', 
					// 'markMaximum_TutorAboutPupil1', 
					// 'dateMaximum_TutorAboutPupil1',
					
					// 'comment_Pupil1AboutTutor', 
					// 'mark_Pupil1AboutTutor', 
					// 'date_Pupil1AboutTutor', 
					// 'commentMaximum_Pupil1AboutTutor', 
					// 'markMaximum_Pupil1AboutTutor', 
					// 'dateMaximum_Pupil1AboutTutor',
					
					// 'comment_Pupil1AboutPupil1', 
					// 'mark_Pupil1AboutPupil1', 
					// 'date_Pupil1AboutPupil1', 
					// 'commentMaximum_Pupil1AboutPupil1', 
					// 'markMaximum_Pupil1AboutPupil1', 
					// 'dateMaximum_Pupil1AboutPupil1'
				// ], 
				// 'required'
			// ],
			
            [
				[
					'content_id', 
					'mark_TutorAboutPupil'.$idUser, 
					'mark_Pupil'.$idUser.'AboutTutor', 
					'markMaximum_TutorAboutPupil'.$idUser, 
					'markMaximum_Pupil'.$idUser.'AboutTutor', 
					'mark_Pupil'.$idUser.'AboutPupil'.$idUser, 
					'markMaximum_Pupil'.$idUser.'AboutPupil'.$idUser, 
					'moderationPupil'.$idUser,
				], 
				'integer'
			],
			
            [
				[
					'comment_TutorAboutPupil'.$idUser, 
					'comment_Pupil'.$idUser.'AboutTutor', 
					'commentMaximum_TutorAboutPupil'.$idUser, 
					'commentMaximum_Pupil'.$idUser.'AboutTutor', 
					'comment_Pupil'.$idUser.'AboutPupil'.$idUser, 
					'commentMaximum_Pupil'.$idUser.'AboutPupil'.$idUser
				], 
				'string'
			],
			
            [
				[
					'date_TutorAboutPupil'.$idUser, 
					'date_Pupil'.$idUser.'AboutTutor', 
					'dateMaximum_TutorAboutPupil'.$idUser, 
					'dateMaximum_Pupil'.$idUser.'AboutTutor', 
					'date_Pupil'.$idUser.'AboutPupil'.$idUser, 
					'dateMaximum_Pupil'.$idUser.'AboutPupil'.$idUser
				], 
				'safe'
			],
			
            [['content_id'], 'exist', 'skipOnError' => true, 'targetClass' => Content::className(), 'targetAttribute' => ['content_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'comment_TutorAboutPupil1' => 'Comment  Tutor About Pupil1',
            'mark_TutorAboutPupil1' => 'Mark  Tutor About Pupil1',
            'date_TutorAboutPupil1' => 'Date  Tutor About Pupil1',
            'comment_Pupil1AboutTutor' => 'Comment  Pupil1 About Tutor',
            'mark_Pupil1AboutTutor' => 'Mark  Pupil1 About Tutor',
            'date_Pupil1AboutTutor' => 'Date  Pupil1 About Tutor',
            'commentMaximum_TutorAboutPupil1' => 'Comment Maximum  Tutor About Pupil1',
            'markMaximum_TutorAboutPupil1' => 'Mark Maximum  Tutor About Pupil1',
            'dateMaximum_TutorAboutPupil1' => 'Date Maximum  Tutor About Pupil1',
            'commentMaximum_Pupil1AboutTutor' => 'Comment Maximum  Pupil1 About Tutor',
            'markMaximum_Pupil1AboutTutor' => 'Mark Maximum  Pupil1 About Tutor',
            'dateMaximum_Pupil1AboutTutor' => 'Date Maximum  Pupil1 About Tutor',
            'comment_Pupil1AboutPupil1' => 'Comment  Pupil1 About Pupil1',
            'mark_Pupil1AboutPupil1' => 'Mark  Pupil1 About Pupil1',
            'date_Pupil1AboutPupil1' => 'Date  Pupil1 About Pupil1',
            'commentMaximum_Pupil1AboutPupil1' => 'Comment Maximum  Pupil1 About Pupil1',
            'markMaximum_Pupil1AboutPupil1' => 'Mark Maximum  Pupil1 About Pupil1',
            'dateMaximum_Pupil1AboutPupil1' => 'Date Maximum  Pupil1 About Pupil1',
            'moderationPupil1' => 'Moderation Pupil1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(Content::className(), ['id' => 'content_id']);
    }
}
