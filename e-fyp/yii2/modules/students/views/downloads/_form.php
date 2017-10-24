<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Fyptype;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Downloads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="downloads-form">
	<div id="message" style="color:red; font-size:18px;"><?= Yii::$app->session->getFlash('error');?></div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'documents')->widget(FileInput::classname(), [
                'options' => ['accept' => 'docx/doc/pdf/*', 'multiple' => false],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['doc','pdf','docx'], 
                    'maxFileCount' => 1, 
                    'showUpload' => false,
                    'showRemove' => false,
                    'initialPreview' => [
                        $model->documents ? Html::img('uploads/' . $model->documents, ['height' => '100%']) : null,
                    ],
                ],
        ]);  ?>

   	<?= $form->field($model, 'fypType_ID')->dropDownList(
    ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType'),['prompt'=>'Please choose the type of students you wish to post'])->label('FYP Type') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
