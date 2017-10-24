<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\LogbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>

<h4>Please select an option to search:</h4>
<ul>
	<li class="options">
		<?= Html::a('FYP Title List',['/students/title'])?>
	</li>
	<li class="options">
		
		<?= Html::a('Student List',['/students/students'])?>
	</li>
</ul>

<style type="text/css">
	.options{
		float: left;
		background-color: #CBDCEF;
		width:300px;
		height: 150px;
		list-style-type: none;
		margin:15px;
		cursor:pointer;
		align-content: center;
		display: table;
		text-align: center;
		font-size: 18px;
		padding: 50px;
	}

	.options:hover{
		background-color: #C9D1F1;
	}

</style>