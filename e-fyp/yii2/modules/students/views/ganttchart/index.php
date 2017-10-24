<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\GanttchartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ganttcharts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ganttchart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ganttchart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'activity',
            // 'start',
            ['label'=>'Start Week',
             'value'=>function($model){
                return $model->weeksTextStart;
             },
            ],
            ['label'=>'End Week',
             'value'=>function($model){
                return $model->weeksTextEnd;
             },
            ],
            // 'end',
            'datecompletion',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
