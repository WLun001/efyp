<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Fyptype;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Calendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activities')->textArea(['rows' => 4]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
    		'options' => ['placeholder' => 'Enter date'],
    		'pluginOptions' => ['autoclose'=>true,'format' => 'yyyy-mm-dd' ] ] )?>

    <?= $form->field($model, 'fypTypeID')->dropDownList(
    ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType'),['prompt'=>'Please choose the type of students you wish to post'])->label('FYP Type') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
