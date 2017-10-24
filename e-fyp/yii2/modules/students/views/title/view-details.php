<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => 'FYP 1 Titles', 'url' => ['view-title']];
$this->params['breadcrumbs'][] = ['label' => 'Project Details', 'url' => ['view-details','id'=>$titles->titleID]];
$this->params['breadcrumbs'][] = $this->title;
?>

<h3><?= Html::encode("Project Details") ?></h3>
<hr style="border-top: 1px solid black;"></hr>


<?php 
	if($titles->coSupervisor == ""){

?>
	<?= DetailView::widget([
            'model' => $titles,
            'attributes' => [
                'title',
                'departments',
                'descriptions:ntext',
                'equipment:ntext',
                'course',
                ['label' => 'supervisor',
                'value' => $titles->supervisor0->name,
                ],
                ['label' => 'Co-Supervisor',
                'value' => 'None',
                ],
                ['label' => 'Status',
                'value' => $titles->statusText,
                ],
            ],
        ]) ?>
<?php  } else {	?>
	<?= DetailView::widget([
            'model' => $titles,
            'attributes' => [
                'title',
                'departments',
                'descriptions:ntext',
                'equipment:ntext',
                'course',
                ['label' => 'Supervisor',
                'value' => $titles->supervisor0->name,
                ],
                ['label' => 'Co-Supervisor',
                'value' => $titles->coSupervisor0->name,
                ],
                ['label' => 'Status',
                'value' => $titles->statusText,
                ],
            ],
        ]) ?>
<?php } ?>

<a class="btn btn-primary" role="button"  href="/uploads/Prac4.doc" >
  Download Registration Form
</a>