<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Staff;
use yii\helpers\Url;
use kartik\export\ExportMenu;

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

    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'titleID',
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

        'status',

        ['label' => 'Supervisor',
            'value' => function($model){
                return $model->supervisor0->name;},
            'attribute' => 'name',
            'filter' => ArrayHelper::map(Staff::find()->all(),'id','name')
        ],

        ['label' => 'Co Supervisor',
            'value' => function($model){
                return $model->coSupervisor0->name;},
            'attribute' => 'name',
            'filter' => ArrayHelper::map(Staff::find()->all(),'id','name')
        ],

        'departments',
        'descriptions',
        'equipment',
        'course',
        'moderator',
        'student_fk',
    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);
?>

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
