<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'FYP 1 Titles', 'url' => ['title/view-title']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode("FYP 1 Titles") ?></h2>

<div class="message">
	<p style="color:red;">You had not register a Final Year Project yet. Please print out the Registation Form and find the  supervisor and co-supervisor(if any) of the title that you are interested in. Please get their signature as approval and keep the hard copy of the Registation Form to upload the soft-copy at here to complete the your FYP Registration.  </p>
</div>

<table class="table table-hover">
	<thead>
		<tr>
			<th>No.</th>
			<th>Project Title</th>
			<th>Lecturer</th>
			<th>Email</th>
			<th>Project Details</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>

		<?php $count=0;
			foreach ($titles as $title) {
			$count ++;
			echo '<tr>
					<td>'.$count.'.</td>
					<td>'.$title->title.'</td>
					<td>'.$title->supervisor0->name.'</td>
					<td>'.$title->supervisor0->email.'</td>
					<td style="text-align:center;"><a href="?r=students/title/view-details&id='.$title->titleID.'">View</a></td>
					<td>'.$title->statusText.'</td>
				  </tr>';
				  
		} ?>
	</tbody>
</table>

<style>
	.message{
		display: block;
	}

</style>