<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Fyptype */

$this->title = $model->fypID;
$this->params['breadcrumbs'][] = ['label' => 'Fyptypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fyptype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->fypID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->fypID], [
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
            'fypID',
            'fypType',
        ],
    ]) ?>

</div>
