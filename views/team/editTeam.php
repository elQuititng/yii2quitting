<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;;
	use yii\jui\DatePicker;
	
	$this->title = 'Редагування команди';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-5">

		<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($edit, 'name')->label('Назва команди') ?>

			<?= $form->field($edit,'year')->widget(DatePicker::className(), '' )->label('Рік заснуваня') ?> 
			
			<?= $form->field($edit, 'budget')->label('Річний бюджет') ?>

			<?= $form->field($edit, 'trainer')->label('Тренер') ?>

			<div class="form-group">
				<?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary', 'name' => 'editTeam-button']) ?>
			</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>
