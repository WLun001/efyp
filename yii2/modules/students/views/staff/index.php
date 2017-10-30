<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Staff;
use app\modules\students\models\UploadFile;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

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

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadModal">Upload File</button>
        
    </p>
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
]); ?>

<div id="uploadModal" class="modal fade" role="dialog">
    
    <div class="modal-dialog">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Files</h4>
        </div>
        <div class="modal-body">
            <p>Select File to Upload:</p>

            <?= $form->field($model, 'files')->fileInput() ?>   
                
                <label>*in xlsx/csv format<br/>*not more than 1MB</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::submitButton('Upload File', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>
    <?php ActiveForm::end() ?>
</div>
</div>
