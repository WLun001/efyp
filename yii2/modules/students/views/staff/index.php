<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use yii\helpers\Url;
use arturoliveira\ExcelView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export to CVS', ['export'/*, 'userID' =>
                    ArrayHelper::getValue(Yii::$app->request->get(), 'StaffSearch.userID')*/],
                    /*[Yii::$app->request->queryParams['StaffSearch']["userID"] =>
                    ArrayHelper::getValue(Yii::$app->request->get(), 'StaffSearch.userID') ],*/ [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to export?',
                        'method' => 'post',
                    ],
                ]); ?>
    </p>        <?php //rint_r($dataProvider->getModels()); ?>

    <?php
    $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'userID',
        ['label'=>'Role',
            'value'=>function($model){
                return $model->rolesText;
            },
        ],
    'name',
        'contactNo',
        'email',
        ['label'=>'Faculty',
            'value'=>function($model){
                return $model->faculty->faculty;
            },
            'attribute' => 'faculty',
            'filter' => ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty')
        ],
    ['class' => 'yii\grid\ActionColumn'],
    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

   /* echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);*/

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'userID',
            ['label'=>'Role',
             'value'=>function($model){
                return $model->rolesText;
             },
            ],
            'name',
            ['label'=>'Faculty',
             'value'=>function($model){
                return $model->faculty->faculty;
             },
             'attribute' => 'faculty',
            'filter' => ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty')
            ],
            // 'departments_fk',
            // 'email:email',
            // 'contactNo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
//        ['layout' => '{summary}<div class="pull-right">{export}&nbsp</div><div>{items}</div>{pager}',
//            'exportConfig' => [
//        \kartik\grid\GridView::EXCEL => ['label' => 'Export to Excel'],
//    ],
    );
    ?>
</div>
