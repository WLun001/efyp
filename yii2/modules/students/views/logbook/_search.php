<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\LogbookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'logbookID') ?>

    <?= $form->field($model, 'week') ?>

    <?= $form->field($model, 'logbookactivity') ?>

    <?= $form->field($model, 'files') ?>

    <?= $form->field($model, 'acknowledgement') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'student_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
