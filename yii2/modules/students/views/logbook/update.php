<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Logbook */

$this->title = 'Update Logbook: ' . $model->logbookID;
$this->params['breadcrumbs'][] = ['label' => 'Logbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->logbookID, 'url' => ['view', 'id' => $model->logbookID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logbook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
