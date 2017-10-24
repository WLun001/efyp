<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'Downloads', 'url' => ['downloads/view-download']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h1><?= Html::encode("Downloads") ?></h1>
<?= Html::a('<img class="icon" src="image/download.png">')?>

<table class="table table-hover">
	<tbody>
	<?php $count=0; 
	foreach ($downloads as $download) {
			$count++;
		echo'<tr><td>'. $count .'</td>
			<th><a class="file" href="/uploads/'. $download->documents .'" download>'.$download->documents.'</th>
			<td align="right">'.'<a href="/uploads/'. $download->documents .'" download><img class="d_icon" src="image/u96.png">'.'</td>
		</tr>'; 
		} ?>
	</tbody>
</table>
<script>
// $(document).ready(function(){
// 	$(".file").click(function(){
// 		console.log($(this).attr("href"));
// 		window.open($(this).attr(),'_blank');
// 	});
// 	});
</script>

<style>
	.icon{
		height:40px;
		width: 40px;
		float: left;
		margin: 17px 5px 10px 9px;

	}

	.d_icon{
		height:25px;
		width: 25px;
		cursor: pointer;overflow-x: x	
	}

	h1{
		float: left;
	}

	th{
		cursor: pointer;
	}
</style>