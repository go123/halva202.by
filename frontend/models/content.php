<?php

namespace app\models;

use Yii;

class content{
	
	function getContent_for_pupil($idPupil){
		$contentLessons=$this->getLessons_for_pupil($idPupil);
		return $contentLessons;
	}
	
	function getLessons_for_pupil($idPupil=1){
		$lessons_object = lesson::find()->all();
		$lessons_array=[];
		foreach($lessons_object as $lesson){
			$property_TutorAboutPupil='TutorAboutPupil'.$idPupil;
			$property_PupilAboutTutor='Pupil'.$idPupil.'AboutTutor';
			$lesson_array=[
				'title'=>$lesson->title,
				'TutorAboutPupil'=>$lesson->$property_TutorAboutPupil,
				'PupilAboutTutor'=>$lesson->$property_PupilAboutTutor,
			];
			array_push($lessons_array,$lesson_array);
			
		}
		return $lessons_array;
	}
}