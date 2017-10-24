<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Departments;
use app\modules\students\models\Course;
use app\modules\students\models\Staff;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Title */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="title-form">
<?php $allCourse = ArrayHelper::map($course,'courseID','courseName');?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'batch')->textInput(['maxlength' => true])->label('Batch (Eg: January 2017)') ?>

    <?= $form->field($model, 'category')->dropDownList(
    $model->category0,['prompt'=>'Please Select'])->label('FYP Category') ?>

    <?= $form->field($model, 'faculty')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty'),['prompt'=>'Please Choose a Faculty']) ?>

    <?= $form->field($model, 'departments')->dropDownList(
    ArrayHelper::map(Departments::find()->all(),'department','department'),['prompt'=>'Please Choose a Department'])->label('Department') ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'equipment')->textarea(['rows' => 2]) ?>
    <div class="courseWrapper">

    <?= $select= $form->field($model, 'courseArray[]')->dropDownList(
    $allCourse,['prompt'=>'Please Choose a Course'])->label('Suitable For Course') ?>

    </div>

    <button id="addCourseBtn" type="button" class="btn">Add More Course</button>
    <?= $form->field($model, 'supervisor')->dropDownList(
    ArrayHelper::map($supervisors,'id','name'),['prompt'=>'Please Choose a Supervisor'])->label('Supervisor') ?>

    <?= $form->field($model, 'coSupervisor')->dropDownList(
    ArrayHelper::map($supervisors,'id','name'),['prompt'=>'Please Choose a Co-Supervisor'])->label('Co-Supervisor (If none,leave it blank)') ?>


    <?= $form->field($model, 'moderator')->dropDownList(
    ArrayHelper::map($supervisors,'id','name'),['prompt'=>'Please Choose a Moderator'])->label('Moderator (If none,leave it blank)') ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
    $str = json_encode($select->parts['{input}']);

    ?>

</div>

<?php $this->registerJS("

        $( document ).ready(function() {

            
            $('#addCourseBtn').click(function(){

                $('.courseWrapper').append(".$str.").append('<br/>');
              
            });
            

        });


    ")
    
?>
