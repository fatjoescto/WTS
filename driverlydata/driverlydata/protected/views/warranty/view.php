<?php
$this->breadcrumbs=array(
	'Warranties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Warranty', 'url'=>array('index')),
	array('label'=>'Create Warranty', 'url'=>array('create')),
	array('label'=>'Update Warranty', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Warranty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Warranty', 'url'=>array('admin')),
);
?>

<h1>View Warranty #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Manufacturer',
		'Basic',
		'Powertrain',
		'Corrosion',
		'RoadsideAssit',
		'BasicNotice',
		'PowerTrainNotice',
		'CorrosionNotice',
		'RoadSideNotice',
	),
)); ?>
