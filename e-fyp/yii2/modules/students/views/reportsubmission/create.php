<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Reportsubmission */

$this->title = 'Report Submission:';
$this->params['breadcrumbs'][] = ['label' => 'Report Submission', 'url' => ['report/submit']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportsubmission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
