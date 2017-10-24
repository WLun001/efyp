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

    <?= $form->field($model, 'userID')->textInput(['maxlength' => true])->label("Username (use to login)") ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty_fk')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty'),['prompt'=>'Please Choose a Faculty']) ?>

    <?= $form->field($model, 'departments_fk')->dropDownList(
    ArrayHelper::map(Departments::find()->all(),'department','department'),['prompt'=>'Please Choose a Department']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="roleWrapper">

    <?= $select=$form->field($model, 'roleArray[]')->dropDownList(($model->roles), ['prompt'=>"Select Role to Assign"])->label('Role') ?>

    </div>
    <button id="addRoleBtn" type="button" class="btn" style="margin-bottom: 10px;">Add More Role To Assign</button>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
        $str = json_encode($select->parts['{input}']);
    ?>

</div>

<?php $this->registerJS("

        $( document ).ready(function() {

            
            $('#addRoleBtn').click(function(){

                $('.roleWrapper').append(".$str.").append('<br/>');
              
            });
            

        });


    ")
    
?>