<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Ganttchart */

$this->title = 'Create Ganttchart';
$this->params['breadcrumbs'][] = ['label' => 'Log Book', 'url' => ['logbook']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ganttchart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
