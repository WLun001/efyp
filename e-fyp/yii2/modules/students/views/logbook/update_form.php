<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Logbook */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="logbook-form">
	    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'logbookID',
            'week',
            'logbookactivity:ntext',
            'files',
            // 'acknowledgement',
            // 'comment',
            // 'student_fk',
        ],
    ]) ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acknowledgement')->radioList($model->acknowledge) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>