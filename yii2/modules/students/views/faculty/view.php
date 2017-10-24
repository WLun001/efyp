<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\students\models\Departments;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Faculty */

$this->title = $model->facultyID;
$this->params['breadcrumbs'][] = ['label' => 'Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->facultyID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->facultyID], [
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
            'facultyID',
            'faculty',
        ],
    ]) ?>


    <p>Departments of <?= $model->faculty ?><br> </p> 
<ul>
    <?php foreach ($departments as $department){ ?> 
        <li>
           <?=Html::encode($department['department']);?>

        </li>
        <?php  } ?> 

</ul>
</div>
