<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('average_fuel_price')); ?>:</b>
	<?php echo CHtml::encode($data->average_fuel_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_price')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_type')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_type); ?>
	<br />


</div>