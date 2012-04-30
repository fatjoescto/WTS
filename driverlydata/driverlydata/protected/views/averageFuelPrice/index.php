<?php
$this->breadcrumbs=array(
	'Average Fuel Prices',
);

$this->menu=array(
	array('label'=>'Create AverageFuelPrice', 'url'=>array('create')),
	array('label'=>'Manage AverageFuelPrice', 'url'=>array('admin')),
);
?>

<h1>Average Fuel Prices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
