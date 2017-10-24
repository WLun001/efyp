<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\modules\students\models\Staff;

$user = Yii::$app->user->identity->attributes;  
$staff = Staff::find()->where(['userID'=>$user['username']])->one();
?>
<ul class= "menu-container">

	<li class="options">
		<div img-div>
		<?php $user = Yii::$app->user->identity->attributes;  ?>
			<?= Html::a('<img class="icon" src="image/allocate-students.png">
			<div class="text">Allocate Students</div>',['title/allocate-students','user'=>$staff["id"]])?>
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
			<?= Html::a('<img class="icon" src="image/view-students.png">
			<div class="text">View Students</div>',['students/view-own-students'])?>
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
