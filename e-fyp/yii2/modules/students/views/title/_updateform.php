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

    <div style="display: none;">
        <?= $select= $form->field($model, 'courseArray[]')->dropDownList(
        $allCourse,['prompt'=>'Please Choose a Course'])->label('Suitable For Course') ?>
    </div>
    
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
    <?php  $count=1; ?>
    <label class="control-label">Suitable for course</label>
    <?php foreach($courseArray as $sel_course){ ?>
        <div class="sub_cw" id="cw_<?php echo $count?>">
            <div class="select_wrapper" id="sw_<?php echo $count?>" style="width: 90%;display: inline-block;">
                <?= $form->field($model, 'courseArray[]')->dropDownList(
                $allCourse,array('options' => array($sel_course=>array('selected'=>true))),['prompt'=>'Please Choose a Course'])->label(false) ?>
            </div>
            <?php if($count>1) { ?>
                <button type='button' class='btn btn-danger delete_course_butt' >Delete</button>
            <?php } ?>
        </div>
    <?php 
    $count++;
    } ?>
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
    $newSubcw = json_encode("<div class='sub_cw'><div class='select_wrapper' style='width: 90%;display: inline-block;'></div><button type='button' class='btn btn-danger delete_course_butt' >Delete</button></div>");
    ?>

</div>

<?php $this->registerJS("

        $( document ).ready(function() {
            var subNum = $('.sub_cw').length;
            // console.log(subNum);
            $('#addCourseBtn').click(function(){

                subNum++;
                var newSw = 'sw_' + subNum;
                
                $('.courseWrapper').append(".$newSubcw.").append('<br/>');

                $('.sub_cw').last().children('.select_wrapper').attr('id', 'sw_'+subNum);
                $('#'+newSw).append(".$str.");

                $('.delete_course_butt').click(function(){
                    $(this).parents('.sub_cw').next().remove();
                    $(this).parents('.sub_cw').remove();
                });
              
            });

            $('.delete_course_butt').click(function(){

                    
                    $(this).parents('.sub_cw').remove();
                });
            
            

        });


    ")
    
?>
