<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<ul class= "menu-container">

	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/search.png">
			<div class="text">Search</div>',['search'])?>
		</div>
		
	</li>
	<li class="options">
		<div img-div>
		 <?= Html::a('<img class="icon" src="image/upload-documents.png">
			<div class="text">Upload Documents</div>',['downloads/index'])?>
			
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/report.png">
			<div class="text">Set Report Deadlines</div>',['report/index'])?>
		</div>
	</li>
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/announcements.png">
			<div class="text">Post Announcement</div>',['announcement/index'])?>
		</div>
	</li>
<!-- 	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/send-mail.png">
			<div class="text">Send Alert</div>')?>
		</div>
	</li> -->
	<li class="options">
		<div img-div>
			<?= Html::a('<img class="icon" src="image/set-schedule.png">
			<div class="text">Set Calendar</div>',['calendar/index'])?>
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
