<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Course;
use app\modules\students\models\Title;
$this->params['breadcrumbs'][] = ['label' => 'Allocate Students', 'url' => ['allocate-students']];
$this->params['breadcrumbs'][] = ['label' => 'Student List', 'url' => ['view-students-list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'studentID',
            'name',
            ['label' => 'Course',
            'value' => function($model){
                return $model->course0->courseID;},
            'attribute' => 'course',
            'filter' => ArrayHelper::map(Course::find()->all(),'courseID','courseID')
            ],
            [
            'attribute' => '',
            'label'=>'Status',
            'format' => 'raw',
            'value' => function($model) use ($registeredStudents){
                 if(in_array($model->studentID, $registeredStudents))
                    return "Registered";
                else
                    return "Unregistered";
                },
            'filter' => ArrayHelper::map(Course::find()->all(),'courseID','courseID')
            ],
            [
            'attribute' => '',
            'format' => 'raw',
            'value' => function ($model) use ($title,$registeredStudents){      
                    if(in_array($model->studentID, $registeredStudents))
                        return "-";
                    else
                        return '<a href="/index.php?r=students%2Ftitle%2Fregister-student&student='.$model->studentID.'&title='.$title.'" >Select</a>';
                 
                },
            ],
         ],
    ]); ?>



