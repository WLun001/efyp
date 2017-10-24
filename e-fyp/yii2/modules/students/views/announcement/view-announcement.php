<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['announcement/view-announcement']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php 
	foreach ($announcement as $value) {
		echo '<h3>'.$value->title.'</h3>'.'<pre>'.$value->body.'</pre>';
	}
?>
<style type="text/css">
	pre{

		font-family:"Times News Roman";
		font-size: 16px;

	}


</style>