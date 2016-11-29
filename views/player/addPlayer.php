<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\jui\DatePicker;
	
	$this->title = 'Новий гравець';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-5">

		<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($add, 'name')->label('Ім\'я') ?>
			
			<?= $form->field($add, 'last_name')->label('Прізвище') ?>

			<?= $form->field($add,'dob')->widget(DatePicker::className(), '' ) ?> 

			<?= $form->field($add, 'position_id')->dropDownList($position)->label('Позиція') ?>
			
			<?= $form->field($add, 'team_id')->dropDownList($selectTeam)->label('Команда') ?>
			
			<div class="form-group">
				<?= Html::submitButton('Додати', ['class' => 'btn btn-primary', 'name' => 'editTeam-button']) ?>
			</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>