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
		<?php echo $form->label($model,'Manufacturer'); ?>
		<?php echo $form->textField($model,'Manufacturer',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Basic'); ?>
		<?php echo $form->textField($model,'Basic',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Powertrain'); ?>
		<?php echo $form->textField($model,'Powertrain',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Corrosion'); ?>
		<?php echo $form->textField($model,'Corrosion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RoadsideAssit'); ?>
		<?php echo $form->textField($model,'RoadsideAssit',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BasicNotice'); ?>
		<?php echo $form->textArea($model,'BasicNotice',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PowerTrainNotice'); ?>
		<?php echo $form->textArea($model,'PowerTrainNotice',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CorrosionNotice'); ?>
		<?php echo $form->textArea($model,'CorrosionNotice',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RoadSideNotice'); ?>
		<?php echo $form->textArea($model,'RoadSideNotice',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->