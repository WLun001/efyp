<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Title */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->titleID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->titleID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        if($model->moderator == "" && $model->coSupervisor != ""){    ?>

            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'titleID',
                'title',
                'batch',
                ['label' => 'Faculty',
            'value' => $model->faculty0->faculty,
            ],
                ['label' => 'Category',
            'value' => $model->categoryWord,
            ],
                'departments',
                'descriptions:ntext',
                'equipment:ntext',
                'course',
                ['label' => 'Supervisor',
                'value' => $model->supervisor0->name,
                ],
                ['label' => 'Co-Supervisor',
                'value' => $model->coSupervisor0->name,
                ],
                'moderator',
                ['label' => 'Status',
                'value' => $model->statusWord,
                ],
            ],
        ]) ?>
    <?php }
        elseif($model->coSupervisor == "" && $model->moderator == ""){    ?>
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'titleID',
                'title',
                'batch',
                ['label' => 'Faculty',
            'value' => $model->faculty0->faculty,
            ],
                ['label' => 'Category',
            'value' => $model->categoryWord,
            ],
                'departments',
                'descriptions:ntext',
                'equipment:ntext',
                'course',
                ['label' => 'Supervisor',
                'value' => $model->supervisor0->name,
                ],
                'coSupervisor',
                'moderator',
                ['label' => 'Status',
                'value' => $model->statusWord,
                ],
            ],
        ]) ?>
       <?php } elseif($model->coSupervisor != "" && $model->moderator != ""){    ?>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'titleID',
            'title',
            'batch',
            ['label' => 'Faculty',
            'value' => $model->faculty0->faculty,
            ],
                ['label' => 'Category',
            'value' => $model->categoryWord,
            ],
            'departments',
            'descriptions:ntext',
            'equipment:ntext',
            'course',
            ['label' => 'Supervisor',
            'value' => $model->supervisor0->name,
            ],
            ['label' => 'Co-Supervisor',
            'value' => $model->coSupervisor0->name,
            ],
            ['label' => 'moderator',
            'value' => $model->moderator0->name,
            ],
            ['label' => 'Status',
            'value' => $model->statusWord,
            ],
        ],
    ]) ?>
      <?php } ?>

    

</div>
