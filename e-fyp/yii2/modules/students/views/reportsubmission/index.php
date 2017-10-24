<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\ReportsubmissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reportsubmissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportsubmission-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reportsubmission', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'report',
            'submissiondate',
            'student_id',
            'files',
            'courseID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
