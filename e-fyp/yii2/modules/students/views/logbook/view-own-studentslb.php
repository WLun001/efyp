<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\modules\students\models\Students;
use app\modules\students\models\Title;
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\GanttchartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if($session['role']=="lecturer"){
$this->title = 'Log Book';
$this->params['breadcrumbs'][] = ['label' => 'View Students', 'url' => ['students/view-own-students']];
$this->params['breadcrumbs'][] = ['label' => 'Students Profile', 'url' => ['students/view-own-students-profile','id'=>$student->studentID]];

$this->params['breadcrumbs'][] = $this->title;
}

?>

<div>
<h3 style="text-align: center;font-weight: bold;">Final Yeal Project Log Book</h3>
	<div class="detail-table">
		<?= DetailView::widget([
        'model' => $student,
        'attributes' => [
        	['label' => 'Category',
	                'value' => $student->fypType0->fypType,
	                ],
            ['label' => 'Course',
	                'value' => $student->course0->courseName,
	                ],
            'name',
            'studentID',
            ['label' => 'FYP Title',
	                'value' => (($title!=null) ? $title->title : "Unregistered"),
	        ],
	                ['label' => 'Supervisor',
	                'value' => (($title!=null) ? $title->supervisor0->name : "Not set"),
	                ],

        ],
    ]) ?>

	</div>
	<hr/>

	<div class="ganttchart">
		<h4 style="text-align: center;font-weight: bold;">Gantt Chart</h4>
		<table id="sample-gc" class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Project Activities</th>
					<th>Planned Completion Date</th>
					<th class="week-th">W1</th>
					<th class="week-th">W2</th>
					<th class="week-th">W3</th>
					<th class="week-th">W4</th>
					<th class="week-th">W5</th>
					<th class="week-th">W6</th>
					<th class="week-th">W7</th>
					<th class="week-th">W8</th>
					<th class="week-th">W9</th>
					<th class="week-th">W10</th>
					<th class="week-th">W11</th>
					<th class="week-th">W12</th>
					<th class="action-column"></th>
				</tr>
			</thead>
			<tbody>
				<td>Eg:</td>
				<td>Project Planning</td>
				<td>13/8/2017</td>
				<td style="background-color: #777777;"></td>
				<td style="background-color: #777777;"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tbody>
		</table>
		<table id="gc" class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Project Activities</th>
					<th>Planned Completion Date</th>
					<th class="week-th">W1</th>
					<th class="week-th">W2</th>
					<th class="week-th">W3</th>
					<th class="week-th">W4</th>
					<th class="week-th">W5</th>
					<th class="week-th">W6</th>
					<th class="week-th">W7</th>
					<th class="week-th">W8</th>
					<th class="week-th">W9</th>
					<th class="week-th">W10</th>
					<th class="week-th">W11</th>
					<th class="week-th">W12</th>
					<th class="action-column"></th>
				</tr>
			</thead>
			<tbody>
				<?php $count=0;


					foreach ($models as $model) {
						$count ++;
						echo '<tr class="item_wrapper" data-start='.$model->start.' data-end='.$model->end.'>
								<td>'.$count.'.</td>
								<td>'.$model->activity.'</td>
								<td>'.$model->datecompletion.'</td>
								<td class="week_column 1" ></td>
								<td class="week_column 2" ></td>
								<td class="week_column 3" ></td>
								<td class="week_column 4" ></td>
								<td class="week_column 5" ></td>
								<td class="week_column 6" ></td>
								<td class="week_column 7" ></td>
								<td class="week_column 8" ></td>
								<td class="week_column 9" ></td>
								<td class="week_column 10" ></td>
								<td class="week_column 11" ></td>
								<td class="week_column 12" ></td>
								<td><a href="index.php?r=students%2Fganttchart%2Fupdate&id='.$model->id.'" title="Update"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="index.php?r=students%2Fganttchart%2Fdelete&id='.$model->id.'" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							  </tr>';
					}

				?>


			</tbody>
		</table>

	</div>



    <hr/>
    <div class="logbook">
    	<h4 style="text-align: center;font-weight: bold;">Log Book</h4>
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th>Week</th>
    				<th>Activities to achieve milestones</th>
    				<th>Uploaded Documents</th>
    				<th>Ackowledge By Supervisor</th>
    				<th>Comments</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php 
    			 $count=0;
					foreach ($logbooks as $logbook) {
						$count ++;
						if($logbook->week == 6 || $logbook->week == 10){
							if($logbook->comment==null){
								echo '<tr class="lb_wrapper" data-week="'.$logbook->week.'" data-ack="'.$logbook->acknowledgement.'" data-comment="'.$logbook->comment.'">
								<td>Week '.$logbook->week.'</td>
								<td class="pre-text">'.$logbook->logbookactivity.'</td>
								<td><a href="/logbook/'.$logbook->files.' " download>'.$logbook->files.'</td>
								<td class="acknowledge"></td>
								<td class="comments"><a href="index.php?r=students%2Flogbook%2Fupdatelb&id='.$logbook->logbookID.'" type="button" class="btn btn-primary">Give Comments</a></td>
							  </tr>';
							}else{
								echo '<tr class="lb_wrapper" data-week="'.$logbook->week.'" data-ack="'.$logbook->acknowledgement.'" data-comment="'.$logbook->comment.'">
								<td>Week '.$logbook->week.'</td>
								<td class="pre-text">'.$logbook->logbookactivity.'</td>
								<td><a href="/logbook/'.$logbook->files.' " download>'.$logbook->files.'</td>
								<td class="acknowledge"></td>
								<td class="comments" style="white-space:pre;">'.$logbook->comment.'</td>

							  </tr>';
							}							
						}else{
							if($logbook->acknowledgement == 0){
								echo '<tr class="lb_wrapper" data-week="'.$logbook->week.'" data-ack="'.$logbook->acknowledgement.'" data-comment="'.$logbook->comment.'">
									<td>Week '.$logbook->week.'</td>
									<td class="pre-text">'.$logbook->logbookactivity.'</td>
									<td><a href="/logbook/'.$logbook->files.' " download>'.$logbook->files.'</td>
									<td class="acknowledge">Pending</td>
									<td class="comments"><a href="index.php?r=students%2Flogbook%2Fcheck&id='.$logbook->logbookID.'" type="button" class="btn btn-primary">Click to Check.</a></td>
								  </tr>';
							}else if ($logbook->acknowledgement == 1) {
								echo '<tr class="lb_wrapper" data-week="'.$logbook->week.'" data-ack="'.$logbook->acknowledgement.'" data-comment="'.$logbook->comment.'">
									<td>Week '.$logbook->week.'</td>
									<td class="pre-text">'.$logbook->logbookactivity.'</td>
									<td><a href="/logbook/'.$logbook->files.' " download>'.$logbook->files.'</td>
									<td class="acknowledge">Reviewed By Supervisor</td>
									<td class="comments"></td>
								  </tr>';
							}							
						}
					} ?>
    		</tbody>
    	</table>



	 </div>

	

</div>
<style type="text/css">
	.detail-table{
		margin:0 auto;
		width: 600px;
	}

	.week-th{
		width: 56px;
		text-align: center;
	}

	.week_column.black{
		background-color: #777777;

	}

	.message{
		color: red;
		display: none;
		text-align: center;
		margin-bottom: 10px;
	}

	.message2{
		color: red;
		display: none;
		text-align: center;
		margin-bottom: 10px;
	}

	.pre-text{
		white-space: pre;
	}

/*	.acknowledge{
		text-align: center;
	}
*/
/*	.comments{
		background-color: #999999;
	}*/

	.hide{
		display: none;
	}

</style>

<?php 
$this->registerJS("
		$(document).ready(function(){

			$('.item_wrapper').each(function(){
				$('#sample-gc').css('display','none');
				var start = $(this).data('start');
				var end = $(this).data('end');	

				for(var i=start; i<=end;i++){
					$(this).find($('.'+i)).addClass('black')

				}
			
			});

			var size = $('.item_wrapper').size();

			if(size == 0){
				
				$('#gc').css('display','none');
				$('#sample-gc').css('display','block');
			}


				
		});
	")

?>