<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facebook-users-FacebookUsers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php echo $form->textField($model,'account_id'); ?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fb_uid'); ?>
		<?php echo $form->textField($model,'fb_uid'); ?>
		<?php echo $form->error($model,'fb_uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_hash'); ?>
		<?php echo $form->textField($model,'email_hash'); ?>
		<?php echo $form->error($model,'email_hash'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->