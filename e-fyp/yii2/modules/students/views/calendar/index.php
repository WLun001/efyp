<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Fyptype;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Set Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'calendarID',
            'activities',
            'date',
            ['label' => 'FYP Type',
            'value' => function($model){
                return $model->fypType->fypType;},

            'attribute' => 'fypTypeID',
            'filter' => ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType')],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
