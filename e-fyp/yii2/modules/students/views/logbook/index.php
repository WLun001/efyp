<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\LogbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logbooks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Logbook', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'logbookID',
            ['label'=>'Week',
             'value'=>function($model){
                return $model->twoWeekText;
             },
            ],
            'logbookactivity:ntext',
            'files',
            'acknowledgement',
            // 'comment',
            // 'student_fk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
