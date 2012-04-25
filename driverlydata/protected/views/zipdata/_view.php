<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZipCode')); ?>:</b>
	<?php echo CHtml::encode($data->ZipCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZipCodeType')); ?>:</b>
	<?php echo CHtml::encode($data->ZipCodeType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('State')); ?>:</b>
	<?php echo CHtml::encode($data->State); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LocationType')); ?>:</b>
	<?php echo CHtml::encode($data->LocationType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Latitude')); ?>:</b>
	<?php echo CHtml::encode($data->Latitude); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Longitude')); ?>:</b>
	<?php echo CHtml::encode($data->Longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Location')); ?>:</b>
	<?php echo CHtml::encode($data->Location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Decommisioned')); ?>:</b>
	<?php echo CHtml::encode($data->Decommisioned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaxReturnsFiled')); ?>:</b>
	<?php echo CHtml::encode($data->TaxReturnsFiled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EstimatedPopulation')); ?>:</b>
	<?php echo CHtml::encode($data->EstimatedPopulation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalWages')); ?>:</b>
	<?php echo CHtml::encode($data->TotalWages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsTireTough')); ?>:</b>
	<?php echo CHtml::encode($data->IsTireTough); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsConvertible')); ?>:</b>
	<?php echo CHtml::encode($data->IsConvertible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is4x4')); ?>:</b>
	<?php echo CHtml::encode($data->is4x4); ?>
	<br />

	*/ ?>

</div>