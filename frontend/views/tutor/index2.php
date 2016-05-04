<?php
use yii\helpers\Url;
$this->title = $user['username'].' - pupil';
?>
<div class="site-index">

    <div class="body-content">
	
	index2<br>
	<?php 
	var_dump($contentLessons);
	?><br><br><br>
	
	<div class="item pupil">
		pupil - <?= $user['username'] ?>
		<div>
			<?php if($userprofile['TutorAboutPupil']!=""): ?>
			<p>
				Opinion of tutor about pupil: <?= $userprofile['TutorAboutPupil'] ?>
			</p>
			<?php endif; ?>
		</div>
		
		<div>
			<p>
			<?php if($userprofile['PupilAboutTutor']!=""): ?>
				Opinion of pupil about tutor: <?= $userprofile['PupilAboutTutor'] ?>
			<?php endif; ?>
			<a href="<?= Url::to(['tutor/opinion', 'about' => 'pupil']) ?>"> более подробное описание + редактирование </a>
			</p>
		</div>
	</div>

	
	<?php foreach($contentLessons as $contentLesson): ?>
		<div class="item lesson">
			<p>Lesson - <?= $contentLesson['title'] ?></p>
			<div>
			<?php if($contentLesson['TutorAboutPupil']!=""): ?>
				<p>
					Opinion of tutor about pupil: <?= $contentLesson['TutorAboutPupil'] ?>
				</p>
			<?php endif; ?>
			</div>
			
			<div>
				<p>
				<?php if($contentLesson['PupilAboutTutor']!=""): ?>
					Opinion of pupil about tutor: <?= $contentLesson['PupilAboutTutor'] ?>
				<?php endif; ?>
				<a href="<?= Url::to(['tutor/opinion', 'about' => 'lesson']) ?>"> более подробное описание + редактирование </a>
				</p>
			</div>
		</div>
	
	<?php endforeach; ?>

	</div>

</div>

