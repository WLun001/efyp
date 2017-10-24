<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Downloads */

$this->title = "View";
$this->params['breadcrumbs'][] = ['label' => 'Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="downloads-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->downloadID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->downloadID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
    $document = '<a href="uploads/' . $model->documents . '" download>' .$model->documents.'</a>';
?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'downloadID',
            ['label' => 'Uploaded Documents',
             'format'=>'raw',
             'value'=>$document,
             ],

            ['label' => 'Fyp Type',
            'value' => $model->fypType->fypType,
            ]
        ],
    ]) ?>

</div>
