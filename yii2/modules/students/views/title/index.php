<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\TitleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Title', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'titleID',
            'title',
            'batch',
            ['label' => 'Category',
            'value' => function($model){
                return $model->categoryWord;},

            ],
            ['label' => 'Faculty',
            'value' => function($model){
                return $model->faculty0->faculty;},
            'attribute' => 'faculty',
            'filter' => ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty')
            ],
            // 'departments',
            // 'descriptions:ntext',
            // 'equipment:ntext',
            // 'course',
            // 'status',
            // 'supervisor',
            // 'coSupervisor',
            // 'moderator',
            // 'student_fk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
