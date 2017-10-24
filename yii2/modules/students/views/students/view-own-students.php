<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\students\models\Students;

$this->params['breadcrumbs'][] = ['label' => 'View Students', 'url' => ['students/view-own-students']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h5>Please choose which FYP students to view<h5>

<div>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>No.</th>
			<th>Students Name</th>
			<th>Project Title</th>
			<th>Position</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $count=0;
			foreach ($titles as $title) {
				$count++;
				$students = Students::find()->where(['studentID'=>$title->student_fk])->one();
				$x="";
				if($title->supervisor){
					$x = "Supervisor";
				}else if($title->coSupervisor){
					$x = "Co-supervisor";
				}else if($titile->moderator){
					$x = "Moderator";
				}
				echo '<tr class="table_wrapper">
						<td>'.$count.'</td>
						<td>'.$students->name.'</td>
						<td>'.$title->title.'</td>
						<td class="position">'.$x.'</td>
						<td><a href="index.php?r=students%2Fstudents%2Fview-own-students-profile&id='. $students->studentID .'">View</a></td>
					  </tr>';
			}
		?>
	</tbody>
	</table>
</div>
