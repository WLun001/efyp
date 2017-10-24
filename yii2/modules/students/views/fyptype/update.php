<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Fyptype */

$this->title = 'Update Fyptype: ' . $model->fypID;
$this->params['breadcrumbs'][] = ['label' => 'Fyptypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fypID, 'url' => ['view', 'id' => $model->fypID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fyptype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
