<? 
	use yii\helpers\Html; 
	use yii\helpers\Url;
	
	$this->title = 'Менеджер команд';
	$this->params['breadcrumbs'][] = '';
?>



<table class="table table-striped">
	<tr>
		<td><b>id<b/></td><td><b>Назва<b></td><td><b>Рік заснування</b></td><td><b>Бюджет</b></td><td><b>Тренер</b></td><td></td><td></td>
	</tr>
	
	
<? foreach( $teams as $team ): ?>
		<tr>
		<td><?=$team['id']?></td>
		<td><?=Html::a( $team['name'], Url::to(['/player/index', 'pl' => $team['id']]) )?></td>
		<td><?=$team['year']?></td>
		<td><?=$team['budget']?> $</td>
		<td><?=$team['trainer']?></td>
		<td class="success" align="center"><?=Html::a( 'Редагувати', Url::to(['/team/edit-team', 'ed' => $team['id']]) )?></td>
		<td class="danger" align="center"><?=Html::a( 'Видалити', Url::to(['/team/delete-team', 'del' => $team['id']]) )?></td>
	</tr>
	<? endForeach;  ?>
</table>
