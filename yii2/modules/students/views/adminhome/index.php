<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>Admin</h1>


<ul>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/staff.png">
			<div class="text">Manage Staff</div>',['/students/staff'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/allocate-students.png">
			<div class="text">Manage Students</div>',['/students/students'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/faculty.png">
			<div class="text">Manage Faculty</div>',['/students/faculty'])?>		
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/departments.png">
			<div class="text">Manage Departments</div>',['/students/departments'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/fyptitle.png">
			<div class="text">Manage Fyp Type</div>',['/students/fyptype'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/role.png">
			<div class="text">Manage Role</div>',['/students/roles'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/title.png">
			<div class="text">Manage Title</div>',['/students/title'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/calendar.png">
			<div class="text">Manage Calendar</div>',['/students/calendar'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/announcements.png">
			<div class="text">Manage Announcements</div>',['/students/announcement'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/upload-documents.png">
			<div class="text">Manage Students Download Documents </div>',['/students/downloads'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/progress.png">
			<div class="text">Manage Report Deadlines</div>',['/students/report'])?>
	</li>
	<li class="options">
		<?= Html::a('<img class="icon" src="image/view-students.png">
			<div class="text">Manage Report Submission</div>',['/students/reportsubmission'])?>
	</li>
</ul>
<style type="text/css">
	.options{
		float:left;
		background-color: #CBDCEF;
		align-content: center;
		display: table;
		list-style-type: none;
		width: 200px;
		height: 120px;
		margin:15px;
		cursor: pointer;
		padding:5px;
	}

	.options:hover{
		background-color: #C9D1F1;
	}

	.text{
		text-align: center;
		font-size: 18px;
		vertical-align: middle;
	}

	.icon{
		height: 85px;
		width: 100px;
		display: block;
		margin:16px auto;
	}
</style>