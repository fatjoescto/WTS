<?php
$this->breadcrumbs=array(
	'Zipdatas',
);

$this->menu=array(
	array('label'=>'Create Zipdata', 'url'=>array('create')),
	array('label'=>'Manage Zipdata', 'url'=>array('admin')),
);
?>

<h1>Zipdatas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
