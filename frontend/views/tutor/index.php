<?php

/* @var $this yii\web\View */

$this->title = 'Halva202';
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

use yii\helpers\ArrayHelper;

use yii\helpers\Url;

?>


<div class="site-index">

    <div class="body-content">
	
	<br>
	
	<h1> Общая информация для всех пользователей.</h1>
	
	
	<h1> Информация об ученике </h1>
	<p><?= $userprofile['info'] ?></p>
	
	<h1> Мнение преподавателя об учебном процессе </h1>
	<p><?= $userprofile['myOpinion'] ?></p>
	
	<h1> Мнение ученика об учебном процессе </h1>
	<p><?= $userprofile['pupilOpinion'] ?></p>
	<form action="" method="post">
    <p><textarea rows="10" cols="45" name="text"><?= $userprofile['pupilOpinion'] ?></textarea></p>
    <p><input type="submit" value="Изменить мнение"></p>
	</form>
	
	<h1>Предметы</h1>
	<ul>
	<?php foreach ($modelLessonPlus as $lesson): ?>
		<li>
			<?= $lesson[0]['title'] ?>
			
			<br>
			Мнение преподавателя: <?= $lesson[2]['lesson_'.$lesson[0]['id'].'_TutorOpinion'] ?> 
			
			<br>
			Мнение ученика: <?= $lesson[2]['lesson_'.$lesson[0]['id'].'_PupilOpinion'] ?>
			<form action="" method="post">
			<input type="hidden" name="pupilWantChange">
			<input type="hidden" name="nameCol" value="<?= 'lesson_'.$lesson[0]['id'].'_PupilOpinion' ?>">
			<p><textarea rows="10" cols="45" name="textLesson"><?= $userprofile['lesson_'.$lesson[0]['id'].'_PupilOpinion'] ?></textarea></p>
			<p><input type="submit" value="Изменить мнение"></p>
			</form>
			
			<ul>
				<?php foreach ($lesson[1] as $lessonSection): ?>
				<li>
					<?= $lessonSection[0]['title'] ?> 
					
					<br>
					Мнение преподавателя: <?= $lesson[2]['sec'.$lessonSection[0]['id'].'TutorOpinion'] ?>
					
					<br>
					Мнение ученика: <?= $lesson[2]['sec'.$lessonSection[0]['id'].'PupilOpinion'] ?>
					<form action="" method="post">
					<input type="hidden" name="nameCol" value="<?= 'sec'.$lesson[0]['id'].'PupilOpinion' ?>">
					<p><textarea rows="10" cols="45" name="textSection"><?= $userprofile['sec'.$lesson[0]['id'].'PupilOpinion'] ?></textarea></p>
					<p><input type="submit" value="Изменить мнение"></p>
					</form>
			
					<ul>
						<?php foreach ($lessonSection[1] as $lessonSectionTopic): ?>
						<li>
							<?= $lessonSectionTopic['title'] ?>
							
							<br>
							Мнение преподавателя: <?= $lesson[2]['topic'.$lessonSectionTopic['id'].'TutorOpinion'] ?>
							
							<br>
							Мнение ученика: <?= $lesson[2]['topic'.$lessonSectionTopic['id'].'PupilOpinion'] ?>
							<form action="" method="post">
							<input type="hidden" name="nameCol" value="<?= 'topic'.$lessonSectionTopic['id'].'PupilOpinion' ?>">
							<p><textarea rows="10" cols="45" name="textTopic"><?= $userprofile['topic'.$lessonSectionTopic['id'].'PupilOpinion'] ?></textarea></p>
							<p><input type="submit" value="Изменить мнение"></p>
							</form>
							
							
					
						</li>
						<?php endforeach; ?>
					</ul>
					
				</li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
	</ul>

	</div>

</div>

