<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Ganttchart */

$this->title = 'Update Ganttchart: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Book', 'url' => ['logbook']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ganttchart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
