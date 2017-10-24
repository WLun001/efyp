<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Ganttchart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ganttchart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity')->textArea(['rows' => 4])->label('Project Activity') ?>

    <?= $form->field($model, 'datecompletion')->widget(DatePicker::classname(),[
        'options' => ['placeholder' => 'Enter the date completion'],
        'pluginOptions' => ['autoclose'=>true,'format'=>'yyyy-mm-dd']
    ])->label('Planned Completion Date') ?>

    <div style="font-weight: bold;">Please select how many weeks you need to complete this project activities:</div>

    <div class="dropDownList"><?= $form->field($model, 'start')->dropDownList(($model->weeks), ['prompt'=>"Select week"])->label('') ?></div>
    <div style="display: inline-block;margin-right:  40px;margin-left:  40px;"> until </div>

    <div class="dropDownList"><?= $form->field($model, 'end')->dropDownList(($model->weeks), ['prompt'=>"Select week"])->label('') ?></div>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style type="text/css">
    .dropDownList{
        display: inline-block;
        width:180px;
    }
</style>