<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zipdata-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ZipCode'); ?>
		<?php echo $form->textField($model,'ZipCode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'ZipCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ZipCodeType'); ?>
		<?php echo $form->textField($model,'ZipCodeType',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'ZipCodeType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'City'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'State'); ?>
		<?php echo $form->textField($model,'State',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'State'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LocationType'); ?>
		<?php echo $form->textField($model,'LocationType',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'LocationType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Latitude'); ?>
		<?php echo $form->textField($model,'Latitude'); ?>
		<?php echo $form->error($model,'Latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Longitude'); ?>
		<?php echo $form->textField($model,'Longitude'); ?>
		<?php echo $form->error($model,'Longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'Location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Decommisioned'); ?>
		<?php echo $form->textField($model,'Decommisioned',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'Decommisioned'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaxReturnsFiled'); ?>
		<?php echo $form->textField($model,'TaxReturnsFiled'); ?>
		<?php echo $form->error($model,'TaxReturnsFiled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EstimatedPopulation'); ?>
		<?php echo $form->textField($model,'EstimatedPopulation'); ?>
		<?php echo $form->error($model,'EstimatedPopulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TotalWages'); ?>
		<?php echo $form->textField($model,'TotalWages'); ?>
		<?php echo $form->error($model,'TotalWages'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsTireTough'); ?>
		<?php echo $form->textField($model,'IsTireTough'); ?>
		<?php echo $form->error($model,'IsTireTough'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsConvertible'); ?>
		<?php echo $form->textField($model,'IsConvertible'); ?>
		<?php echo $form->error($model,'IsConvertible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is4x4'); ?>
		<?php echo $form->textField($model,'is4x4'); ?>
		<?php echo $form->error($model,'is4x4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->