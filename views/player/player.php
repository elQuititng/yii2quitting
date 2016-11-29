<?
	use yii\helpers\Html;
	use yii\helpers\Url;
	
	
	$this->title = 'Гравці';
	$this->params['breadcrumbs'][] = $this->title;
?>
<? if( $players ): ?>
	<table class="table table-striped">
		<tr>
			<td><b>id<b/></td><td><b>Ім'я<b></td><td><b>Прізвище</b></td><td><b>Дата народження</b></td><td><b>Позиція</b></td><td></td><td  align="center"></td>
		</tr>
		<? foreach( $players as $player ): ?>
			<tr>
			<td><?=$player['id']?></td>
			<td><?=$player['name']?></td>
			<td><?=$player['last_name']?></td>
			<td><?=$player['dob']?></td>
			<td><?=$player['position_id']?></td>
			<td class="success" align="center"><?=Html::a( 'Редагувати', Url::to(['/player/redaction-player', 'red' => $player['id']]))?></td>
			<td class="danger" align="center"><?=Html::a( 'Видалити', Url::to(['/player/delete-player', 'del' => $player['id']]))?></td>
		</tr>
		<? endForeach; ?>
	</table>
<? endIf; ?>