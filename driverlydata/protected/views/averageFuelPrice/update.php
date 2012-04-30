<?php
$this->breadcrumbs=array(
	'Average Fuel Prices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AverageFuelPrice', 'url'=>array('index')),
	array('label'=>'Create AverageFuelPrice', 'url'=>array('create')),
	array('label'=>'View AverageFuelPrice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AverageFuelPrice', 'url'=>array('admin')),
);
?>

<h1>Update AverageFuelPrice <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>