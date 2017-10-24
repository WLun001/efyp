<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\Fyptype */

$this->title = 'Create Fyptype';
$this->params['breadcrumbs'][] = ['label' => 'Fyptypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fyptype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
