<?php
$this->breadcrumbs=array(
	'Facebook Users'=>array('index'),
	$model->fb_uid,
);

$this->menu=array(
	array('label'=>'List FacebookUsers', 'url'=>array('index')),
	array('label'=>'Create FacebookUsers', 'url'=>array('create')),
	array('label'=>'Update FacebookUsers', 'url'=>array('update', 'id'=>$model->fb_uid)),
	array('label'=>'Delete FacebookUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fb_uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacebookUsers', 'url'=>array('admin')),
);
?>

<h1>View FacebookUsers #<?php echo $model->fb_uid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fb_uid',
		'email_hash',
		'account_id',
	),
)); ?>
