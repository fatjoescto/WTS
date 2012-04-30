<?php
$this->breadcrumbs=array(
	'Zipdatas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Zipdata', 'url'=>array('index')),
	array('label'=>'Create Zipdata', 'url'=>array('create')),
	array('label'=>'Update Zipdata', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Zipdata', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zipdata', 'url'=>array('admin')),
);
?>

<h1>View Zipdata #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ZipCode',
		'ZipCodeType',
		'City',
		'State',
		'LocationType',
		'Latitude',
		'Longitude',
		'Location',
		'Decommisioned',
		'TaxReturnsFiled',
		'EstimatedPopulation',
		'TotalWages',
		'IsTireTough',
		'IsConvertible',
		'is4x4',
	),
)); ?>
