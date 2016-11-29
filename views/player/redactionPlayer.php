<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\jui\DatePicker;
	
	$this->title = 'Редагування гравця';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-5">
	
		<?php $form = ActiveForm::begin(); ?>
		
		<?= $form->field($redaction, 'name'); ?>
			
		<?= $form->field($redaction, 'last_name'); ?>
		
		<?= $form->field($redaction, 'dob')->widget(DatePicker::className(), ['clientOptions' => ['defaultDate' => $redaction->dob]] ); ?> 
		
		<?= $form->field($redaction, 'position_id')->dropDownList($position); ?>
		
		<?= $form->field($redaction, 'team_id')->dropDownList($selectTeam); ?>
		
		<div class="form-group">
			<?= Html::submitButton('Додати', ['class' => 'btn btn-primary', 'name' => 'editTeam-button']); ?>
		</div>
		
		<?php ActiveForm::end(); ?>

	</div>
</div>
