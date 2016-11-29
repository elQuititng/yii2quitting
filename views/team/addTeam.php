<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\jui\DatePicker;
	
	$this->title = 'Додати команду';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-5">

		<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($add, 'name') ?>

			<?= $form->field($add,'year')->widget(DatePicker::className(), ['clientOptions' => ['defaultDate' => $add->year]] ) ?> 
			
			<?= $form->field($add, 'budget') ?>

			<?= $form->field($add, 'trainer') ?>

			<div class="form-group">
				<?= Html::submitButton('Додати', ['class' => 'btn btn-primary', 'name' => 'editTeam-button']) ?>
			</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>
