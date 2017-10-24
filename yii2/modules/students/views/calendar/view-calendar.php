<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'FYP Calendar', 'url' => ['calendar/view-calendar']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode("FYP Calendar") ?></h1>

<table class="table table-striped">
    <?php for($i=0; $i<sizeof($calendar); $i++) {
   		echo '<tr><td>'.($i+1).'.</td><td class="title">'.$calendar[$i]['activities'].'</td><td>'.$calendar[$i]['date']. '</td></tr>'; 
  }?>
</table>

<style>
	.title{
		width:1000px;
		padding-left: 4px;
	}
</style>