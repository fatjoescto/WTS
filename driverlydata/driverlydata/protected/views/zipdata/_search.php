<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ZipCode'); ?>
		<?php echo $form->textField($model,'ZipCode',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ZipCodeType'); ?>
		<?php echo $form->textField($model,'ZipCodeType',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'State'); ?>
		<?php echo $form->textField($model,'State',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LocationType'); ?>
		<?php echo $form->textField($model,'LocationType',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Latitude'); ?>
		<?php echo $form->textField($model,'Latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Longitude'); ?>
		<?php echo $form->textField($model,'Longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Decommisioned'); ?>
		<?php echo $form->textField($model,'Decommisioned',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TaxReturnsFiled'); ?>
		<?php echo $form->textField($model,'TaxReturnsFiled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EstimatedPopulation'); ?>
		<?php echo $form->textField($model,'EstimatedPopulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalWages'); ?>
		<?php echo $form->textField($model,'TotalWages'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsTireTough'); ?>
		<?php echo $form->textField($model,'IsTireTough'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsConvertible'); ?>
		<?php echo $form->textField($model,'IsConvertible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is4x4'); ?>
		<?php echo $form->textField($model,'is4x4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->