<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Downloads */

$this->title = 'Update Downloads: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->downloadID, 'url' => ['view', 'id' => $model->downloadID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="downloads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
