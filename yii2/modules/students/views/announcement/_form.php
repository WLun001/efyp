<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Fyptype;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Announcement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fypTypeID')->dropDownList(
    ArrayHelper::map(Fyptype::find()->all(),'fypID','fypType'),['prompt'=>'Please choose the type of students you wish to post'])->label('Post to') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    

    <?= $form->field($model, 'body')->textarea(['rows' => 8,'maxlength'=>100000]) ?>

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
