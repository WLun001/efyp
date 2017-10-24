<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            ['label'=>'Race',
             'value'=>function($model){
                return $model->raceText;
             },
            ],
            ['label'=>'Gender',
             'value'=>function($model){
                return $model->genderText;
             },
            ],
            ['label' => 'Faculty',
            'value' => function($model){
                return $model->faculty0->faculty;},
            'attribute' => 'faculty',
            'filter' => ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty')
            ],
            'course',
            // 'fypType',
            // 'picture',
            // 'studentID',
            // 'email:email',
            // 'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
