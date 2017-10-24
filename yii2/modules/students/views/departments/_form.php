<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'faculty_fk')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(),'facultyID','faculty'),['prompt'=>'Please Choose a Faculty'])->label('Faculty') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
