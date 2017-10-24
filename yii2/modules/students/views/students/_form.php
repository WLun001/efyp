<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;
use app\modules\students\models\Course;
use app\modules\students\models\Fyptype;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'studentID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'race')->dropDownList(($model->races),['prompt'=>"Select Race"]) ?>

    <?= $form->field($model, 'gender')->dropDownList(($model->genders),['prompt'=>"Select Gender"]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty'),['prompt'=>'Please Choose a Faculty']) ?>

    <?= $form->field($model, 'course')->dropDownList(
    ArrayHelper::map(Course::find()->all(),'courseID','courseName'),['prompt'=>'Please Choose a Course']) ?>

    <?= $form->field($model, 'fypType')->dropDownList(
    ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType'),['prompt'=>'Please choose '])->label('FYP Type') ?>



    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['jpg','png','jpeg'], 
                    'maxFileCount' => 1, 
                    'showUpload' => false,
                    'showRemove' => true,

                ],
        ]);  ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
