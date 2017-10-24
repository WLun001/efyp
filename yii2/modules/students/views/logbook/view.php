<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Logbook */

$this->title = $model->logbookID;
$this->params['breadcrumbs'][] = ['label' => 'Logbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logbook-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->logbookID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->logbookID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'logbookID',
            'week',
            'logbookactivity:ntext',
            'files',
            'acknowledgement',
            'comment',
            'student_fk',
        ],
    ]) ?>

</div>
