<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\modules\students\models\Students;
$user = Yii::$app->user->identity->attributes;

?>
<ul class= "menu-container">


	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/fyptitle.png">
			<div class="text">FYP Title</div>',['title/view-title'])?>
		</div>
		
	</li>
	<li class="options">
		<div img-div>
		 <?= Html::a('<img class="icon" src="image/calendar.png">
			<div class="text">FYP Calendar</div>',['calendar/view-calendar'])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/announcements.png">
			<div class="text">Announcements</div>',['announcement/view-announcement'])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/profile.png">
			<div class="text">Profile</div>',['students/view-students-profile','id'=>$user['username']])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/logbook.png">
			<div class="text">Log Book</div>',['ganttchart/logbook'])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/downloads.png">
			<div class="text">Downloads</div>',['downloads/view-download'])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/report.png">
			<div class="text">Report Submission</div>',['report/submit'])?>
		</div>
	</li>

</ul>
<style type="text/css">
	.options{
		float: left;
		background-color: #CBDCEF;
		width:300px;
		height: 150px;
		list-style-type: none;
		margin:15px;
		cursor:pointer;
		align-content: center;
		display: table;
	}

	.options:hover{
		background-color: #C9D1F1;
	}

	.img-div{
		display: table-cell;
		vertical-align: middle; 	
	}

	.icon{
		height: 85px;
		width: 100px;
		display: block;
		margin:16px auto;
	}

	.text{
		text-align: center;
		font-size: 18px;
	}
</style>
