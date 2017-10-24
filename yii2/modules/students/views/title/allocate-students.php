<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\students\models\Staff;

$user = Yii::$app->user->identity->attributes;  
$staff = Staff::find()->where(['userID'=>$user['username']])->one();

$this->params['breadcrumbs'][] = ['label' => 'Allocate Students', 'url' => ['title/allocate-students','user'=>$staff["id"]]];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Allocate Students</h2>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Project Title</th>
			<th>Status</th>
			<th>Students</th>
		</tr>
	</thead>
	<?php  
		$count = 0;

		foreach ($titles as $title){ 
			$count++;
			echo '<tr>
					<td>'.$count.'</td>
					<td>'.$title->title.'</td>
					<td>'.$title->statusWord.'</td>';
			if($title->studentFk){
				echo '<td>'.$title->studentFk->name.'</td>';	
			}else{	?>
				<td><?=Html::a('Allocate',['students/view-students-list', 'title'=>$title->titleID]) ?></td>
		<?php } 
					
				  echo '</tr>';
	 	} 
	 ?>
	
</table>

