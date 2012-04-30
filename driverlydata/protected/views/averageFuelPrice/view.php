<?php
$this->breadcrumbs=array(
	'Average Fuel Prices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AverageFuelPrice', 'url'=>array('index')),
	array('label'=>'Create AverageFuelPrice', 'url'=>array('create')),
	array('label'=>'Update AverageFuelPrice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AverageFuelPrice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AverageFuelPrice', 'url'=>array('admin')),
);
?>

<h1>View AverageFuelPrice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'state',
		'average_fuel_price',
		'date_of_price',
		'fuel_type',
	),
)); ?>
