<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'average-fuel-price-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'average_fuel_price'); ?>
		<?php echo $form->textField($model,'average_fuel_price',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'average_fuel_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_price'); ?>
		<?php echo $form->textField($model,'date_of_price'); ?>
		<?php echo $form->error($model,'date_of_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_type'); ?>
		<?php echo $form->textField($model,'fuel_type',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'fuel_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->