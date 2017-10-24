<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Logbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logbook-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="">
        <?= $form->field($model, 'week')->dropDownList(($model->twoWeeks), ['prompt'=>"Select week"])->label('') ?>
            
    </div>

    <?= $form->field($model, 'logbookactivity')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'files')->widget(FileInput::classname(), [
                'options' => ['accept' => 'docx/doc/pdf/*', 'multiple' => false],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['doc','pdf','docx'], 
                    'maxFileCount' => 1, 
                    'showfiles' => false,
                    'showRemove' => false,
                    'initialPreview' => [
                        $model->files ? Html::img('filess/' . $model->files, ['height' => '100%']) : null,
                    ],
                ],
        ]);  ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
