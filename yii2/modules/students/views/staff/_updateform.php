<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Roles;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: none;">
    <?= $select=$form->field($model, 'roleArray[]')->dropDownList(($model->roles), ['prompt'=>"Select Role to Assign"])->label('Role') ?>
    </div>
    <?= $form->field($model, 'userID')->textInput(['maxlength' => true])->label("Username (use to login)") ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty_fk')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty'),['prompt'=>'Please Choose a Faculty']) ?>

    <?= $form->field($model, 'departments_fk')->dropDownList(
    ArrayHelper::map(Departments::find()->all(),'department','department'),['prompt'=>'Please Choose a Department']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactNo')->textInput(['maxlength' => true]) ?>


    <div class="roleWrapper">
    <?php  $count=1; ?>  
    <label class="control-label">Role</label>
    <?php foreach($roleArray as $sel_role){ ?>
        <div class="sub_rw" id="rw_<?php echo $count?>">
            <div class="select_wrapper" id="sw_<?php echo $count?>" style="width: 90%;display: inline-block;">
                <?= $form->field($model, 'roleArray[]')->dropDownList(
                $model->roles,array('options' => array($sel_role=>array('selected'=>true))),['prompt'=>'Select Role to Assign'])->label(false) ?>
            </div>
            <?php if($count>1) { ?>
                <button type='button' class='btn btn-danger delete_role_butt' >Delete</button>
            <?php } ?>
        </div>
    <?php 
    $count++;
    } ?>
    </div>

    <button id="addRoleBtn" type="button" class="btn" style="margin-bottom: 10px;">Add More Role To Assign</button>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
        $str = json_encode($select->parts['{input}']);
    $newSubrw = json_encode("<div class='sub_rw'><div class='select_wrapper' style='width: 90%;display: inline-block;'></div><button type='button' class='btn btn-danger delete_role_butt' >Delete</button></div>");
    ?>

</div>

<?php $this->registerJS("

        $( document ).ready(function() {
            var subNum = $('.sub_rw').length;
            // console.log(subNum);
            $('#addRoleBtn').click(function(){

                subNum++;
                var newSw = 'rw_' + subNum;
                
                $('.roleWrapper').append(".$newSubrw.").append('<br/>');

                $('.sub_rw').last().children('.select_wrapper').attr('id', 'rw_'+subNum);
                $('#'+newSw).append(".$str.");

                $('.delete_role_butt').click(function(){
                    $(this).parents('.sub_rw').next().remove();
                    $(this).parents('.sub_rw').remove();
                });
              
            });

            $('.delete_role_butt').click(function(){

                    
                    $(this).parents('.sub_rw').remove();
                });
            
            

        });


    ")
    
?>