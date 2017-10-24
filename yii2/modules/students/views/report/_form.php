<?php

use kartik\helpers\Html;
use kartik\field\FieldRange;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Course;
use app\modules\students\models\Fyptype;
/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course')->dropDownList(
    ArrayHelper::map(Course::find()->all(),'courseID','courseName'),['prompt'=>'Please Select'])->label('Set To Course') ?>

    <?= $form->field($model, 'fyptype')->dropDownList(
    ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType'),['prompt'=>'Please Select '])->label('Set To FYP Type') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Report Title') ?>

    <?php
            echo FieldRange::widget([
        'form' => $form,
        'model' => $model,
        'label' => 'Enter date and time range (Start Date & Due Date)',
        'attribute1' => 'start',
        'attribute2' => 'due',
        'type' => FieldRange::INPUT_DATETIME,
    ]);
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Set' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
