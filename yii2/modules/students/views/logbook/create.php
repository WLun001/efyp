<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Logbook */

$this->title = 'Create Logbook';
$this->params['breadcrumbs'][] = ['label' => 'Log Book', 'url' => ['ganttchart/logbook']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
