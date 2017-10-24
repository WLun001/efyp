<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\FyptypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fyptypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fyptype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fyptype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'fypID',
            'fypType',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
