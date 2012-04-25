<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->Manufacturer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Basic')); ?>:</b>
	<?php echo CHtml::encode($data->Basic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Powertrain')); ?>:</b>
	<?php echo CHtml::encode($data->Powertrain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Corrosion')); ?>:</b>
	<?php echo CHtml::encode($data->Corrosion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoadsideAssit')); ?>:</b>
	<?php echo CHtml::encode($data->RoadsideAssit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BasicNotice')); ?>:</b>
	<?php echo CHtml::encode($data->BasicNotice); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PowerTrainNotice')); ?>:</b>
	<?php echo CHtml::encode($data->PowerTrainNotice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CorrosionNotice')); ?>:</b>
	<?php echo CHtml::encode($data->CorrosionNotice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoadSideNotice')); ?>:</b>
	<?php echo CHtml::encode($data->RoadSideNotice); ?>
	<br />

	*/ ?>

</div>