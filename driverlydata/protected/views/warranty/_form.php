<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'warranty-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Manufacturer'); ?>
		<?php echo $form->textField($model,'Manufacturer',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Manufacturer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Basic'); ?>
		<?php echo $form->textField($model,'Basic',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Basic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Powertrain'); ?>
		<?php echo $form->textField($model,'Powertrain',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Powertrain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Corrosion'); ?>
		<?php echo $form->textField($model,'Corrosion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Corrosion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RoadsideAssit'); ?>
		<?php echo $form->textField($model,'RoadsideAssit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'RoadsideAssit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BasicNotice'); ?>
		<?php echo $form->textArea($model,'BasicNotice',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'BasicNotice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PowerTrainNotice'); ?>
		<?php echo $form->textArea($model,'PowerTrainNotice',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'PowerTrainNotice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CorrosionNotice'); ?>
		<?php echo $form->textArea($model,'CorrosionNotice',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'CorrosionNotice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RoadSideNotice'); ?>
		<?php echo $form->textArea($model,'RoadSideNotice',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'RoadSideNotice'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->