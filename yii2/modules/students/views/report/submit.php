<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\modules\students\models\Reportsubmission;
$user = Yii::$app->user->identity->attributes;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\GanttchartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Submission';
$this->params['breadcrumbs'][] = $this->title;
?>

<h3>Report Submission</h3>

<div>
	<table class="table table-striped	">

		<tbody>
			<?php 
				$count=0;
				foreach ($reports as $report) {
					$submit = Reportsubmission::find()
                			->where(['student_id'=>$user['username'],'report'=>$report->name])
               			 	->one();

					$count++;
					if($submit){
						echo '<tr class="wrapper" data-start="'.$report->start.'" data-end="'.$report->due.'" data-submit="'.$submit->submissiondate.'" data-count="'.$count.'">
							<td>'.$count.'</td>
							<td>'.$report->name.'</td>
							<td class="submitDate">Start Date: '.$report->start.'<br/>
								Due Date :  '.$report->due .'</td>
							<td class="submision"><a id="'.$count.'" href="/index.php?r=students/reportsubmission/create&report='.$report->name.'" type="button" class="btn btn-primary">Submit Documents</a></td>
						  ';
					}else{
						echo '<tr class="wrapper" data-start="'.$report->start.'" data-end="'.$report->due.'" data-count="'.$count.'">
							<td>'.$count.'</td>
							<td>'.$report->name.'</td>
							<td class="submitDate">Start Date: '.$report->start.'<br/>
								Due Date :  '.$report->due .'</td>
							<td class="submision"><a id="'.$count.'" href="index.php?r=students/reportsubmission/create&report='.$report->name.'" type="button" class="btn btn-primary">Submit Documents</a></td>
							<td></td></tr>
						  ';

					}
					if($submit){

						if(check_date_is_within_range($report->start, $report->due, $submit->submissiondate)){
						    echo '<td></td></tr>';
						} else {
						    echo '<td style="color:red;">Penalty</td></tr>';
						}
					}
					
				}
			?>
		</tbody>
	</table>
</div>



<?php 		function check_date_is_within_range($start_date, $end_date, $todays_date)
			{

			  $start_timestamp = strtotime($start_date);
			  $end_timestamp = strtotime($end_date);
			  $today_timestamp = strtotime($todays_date);

			  return (($today_timestamp >= $start_timestamp) && ($today_timestamp <= $end_timestamp));

			}



$this->registerJS("
		$(document).ready(function(){


			$('.wrapper').each(function(){
				var x = $(this).data('submit');
				if(x != null){
					$('.submitDate',this).append('<br/>Submission Date : ').append(x);3
					var y = $(this).data('count');
					$('#'+ y).replaceWith('<p>Submitted</p>');
				}
				var x = $(this).data('start');
				var y = $(this).data('end');
				console.log(x,y);
			});




		});
	")

?>