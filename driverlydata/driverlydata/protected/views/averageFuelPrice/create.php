<?php
$this->breadcrumbs=array(
	'Average Fuel Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AverageFuelPrice', 'url'=>array('index')),
	array('label'=>'Manage AverageFuelPrice', 'url'=>array('admin')),
);
?>

<h1>Create AverageFuelPrice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>