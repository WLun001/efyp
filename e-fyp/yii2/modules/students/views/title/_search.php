<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\TitleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="title-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'titleID') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'batch') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'faculty') ?>

    <?php // echo $form->field($model, 'departments') ?>

    <?php // echo $form->field($model, 'descriptions') ?>

    <?php // echo $form->field($model, 'equipment') ?>

    <?php // echo $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'supervisor') ?>

    <?php // echo $form->field($model, 'coSupervisor') ?>

    <?php // echo $form->field($model, 'moderator') ?>

    <?php // echo $form->field($model, 'student_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
