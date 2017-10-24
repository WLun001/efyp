<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\students\models\Roles;

$this->title = 'Login as';

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <p>Please fill out the following fields to login:</p>

    <div id="message" style="color:red; font-size:14px;"><?= Yii::$app->session->getFlash('error');?></div>
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'selected')->radioList($model->roles)->label('') ?>


        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>



        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> for Admin page.<br>
        Login to FYP Coordinator page with <strong>111/111</strong>.<br>
        Login to Supervisor page with <strong>123456/123456</strong>.<br>
        Login to Student page with <strong>1406354/1406354</strong>.<br>
    </div>
</div>
