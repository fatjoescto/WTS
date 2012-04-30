<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fb_uid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fb_uid), array('view', 'id'=>$data->fb_uid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_hash')); ?>:</b>
	<?php echo CHtml::encode($data->email_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_id')); ?>:</b>
	<?php echo CHtml::encode($data->account_id); ?>
	<br />


</div>