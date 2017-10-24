<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Students */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->studentID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->studentID], [
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
            'name',
            ['label' => 'Race',
            'value' => $model->raceText,
            ],
            ['label' => 'Gender',
            'value' => $model->genderText,
            ],
            ['label' => 'Faculty',
            'value' => $model->faculty0->faculty,
            ],
            ['label' => 'Course',
            'value' => $model->course0->courseName,
            ],
            ['label' => 'Fyp Type',
            'value' => $model->fypType0->fypType,
            ],
            'picture',
            'studentID',
            'email:email',
            'phone',
        ],
    ]) ?>

    <?= Html::a('View Profile',['view-own-students-profile','id'=>$model->studentID],['class' => 'btn btn-primary'])?>
    <?= Html::a('View Log Book',['logbook/view-own-studentslb','id'=>$model->studentID],['class' => 'btn btn-primary'])?>
</div>
