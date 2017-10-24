<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Reportsubmission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reportsubmission-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'files')->widget(FileInput::classname(), [
                'options' => ['accept' => 'docx/doc/pdf/*', 'multiple' => false],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['doc','pdf','docx'], 
                    'maxFileCount' => 1, 
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview' => [
                        $model->files ? Html::img('submit/' . $model->files, ['height' => '100%']) : null,
                    ],
                ],
        ]);  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
